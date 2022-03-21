<?php
if ($_POST && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['noLogout'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    setcookie('email', $email, time() + 9460800000, '/');
    setcookie('password', $password, time() + 9460800000, '/');
}
?>

<!DOCTYPE html>
<html lang="pl">
<?php include "head.html"; ?>

<body class="bg-dark text-light">
<?php
session_start();
if (($_POST && isset($_POST['email']) && isset($_POST['password'])) ||
    (isset($_COOKIE['email']) && isset($_COOKIE['password']))) {

    $email = $_POST['email'] ?? $_COOKIE['email'];
    $password = $_POST['password'] ?? $_COOKIE['password'];

    include 'database/database connection.php';

    $sql = "select idUser from Users where email = '$email' and password = '$password'";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) == 1) {
        $_SESSION['idUser'] = mysqli_fetch_array($query)['idUser'];


    } else {
        echo '<div class="container">
                <div class="alert alert-danger mt-3">Nie ma konta o takim e–mailu lub haśle.</div>
              </div>';
        $_POST = false;
        include 'index.php';
        exit();
    }
    mysqli_close($con);
}

if (isset($_SESSION['idUser'])) {
    include "database/database connection.php";
    include "navBar.php";

    echo '<div class="container mt-2">';

for ($i = 0;
     $i < 30;
     $i++) {
    if ($i % 6 == 0) {
        echo '<div class="row bg-success bg-gradient">';

    }
    $date = date("Y-m-d", time() + 86400 * $i) . '<br>';

    $sql = "select idEvent, content, timeStart, timeEnd, isDone from Event
                    where date = '$date' and idUser = '" . $_SESSION['idUser'] . "'";
    isset($_GET['dataSort']) ?
        ($sql .= $_GET['dataSort'] ?
            'order by timeStart, isDone' :
            'order by isDone desc, timeStart asc') :
        $sql .= 'order by timeStart, isDone';

    $query = mysqli_query($con, $sql);

    echo "<div class='col-12 col-md-6 col-lg-4 border border-4'>
                      <div class='row border-bottom border-4'>
                            <div class='col bg-info text-black'>Plan na dzień $date</div>
                      </div>";
while ($row = mysqli_fetch_array($query)) {
    ?>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col bg-primary border-bottom border-top border-4">
                    Wydarzenie rozpoczyna się o <?php echo $row['timeStart'] ?>, zakończy się
                    o <?php echo $row['timeEnd'] ?>.
                </div>
            </div>
            <div class="row">
                <div class="col bg-secondary bg-gradient border-bottom border-4 text-break">
                    <?php echo $row['content'] ?>
                </div>
            </div>
            <div class="row">
                <a href="change%20status.php?idDone=<?php echo ($row['isDone']) == 0 ? 1 : 0 ?>&idEvent=<?php echo $row['idEvent'] ?>"
                   class="btn btn-primary col-12 col-lg-4 text-center rounded-0">
                    Czy zadanie zostało wykonane.
                    <?php
                    if ($row['isDone']) {
                        ?>
                        <img src="icons/check.svg" alt="tak">
                        <?php
                    } else {
                        ?>
                        <img src="icons/x.svg" alt="nie">
                        <?php
                    }
                    ?>
                </a>
                <a href="edit%20event.php?idEvent= <?php echo $row['idEvent'] ?> "
                   class="btn btn-warning col-12 col-lg-4 text-center rounded-0">
                    Edytuj wydarzenie.
                </a>
                <a href="delete%20event.php?idEvent= <?php echo $row['idEvent'] ?> "
                   class="btn btn-danger col-12 col-lg-4 text-center rounded-0">
                    Usuń!
                </a>
            </div>
        </div>
    </div>
<?php
}
echo "</div>";
if ($i % 6 == 5) {
    echo '</div>';
}

}

echo '</div>';
?>

    <script src="navbar.js"></script>
    <script>
        activeItemOnNavbar('Strona główna');
        <?php
        if (isset($_GET['dataSort'])) {
            echo "activeSortOption({$_GET['dataSort']});";
        }
        ?>
    </script>
    <?php
} else {
    echo '<div class="container">
                <div class="alert alert-danger mt-3">
                    Nie jesteś zalogowany
                </div>
           </div>';
    include "index.php";
} ?>
</body>
</html>