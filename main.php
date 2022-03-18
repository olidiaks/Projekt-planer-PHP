<!DOCTYPE html>
<html lang="pl">
<?php include "head.html"; ?>

<body class="bg-dark text-light">
<?php
session_start();

if ($_POST && isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    include 'database/database connection.php';

    $sql = "select idUser from Users where email = '$email' and password = '$password'";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) == 1) {
        $_SESSION['idUser'] = mysqli_fetch_array($query)['idUser'];

    } else {
        echo '<div class="container">
                <div class="alert alert-danger mt-3">Nie ma konta o takim e–mailu lub haśle.</div>
              </div>';

    }
    mysqli_close($con);
}

if (isset($_SESSION['idUser'])) {
    include "database/database connection.php";
    include "navBar.php";

    echo '<div class="container mt-2">';

    for ($i = 0; $i < 30; $i++) {
        if ($i % 3 == 0) {
            echo '<div class="row bg-success bg-gradient">';

        }
        $date = date("Y-m-d", time() + 86400 * $i) . '<br>';

        $sql = "select content, timeStart, timeEnd from Event
                    where date = '$date' and idUser = '" . $_SESSION['idUser'] . "'
                    order by timeStart";
        $query = mysqli_query($con, $sql);
        echo "<div class='col-12 col-md-4 border border-4'>
                      <div class='row border-bottom border-4'>
                            <div class='col bg-info text-black'>Plan na dzień $date</div>
                      </div>";
        while ($row = mysqli_fetch_array($query)) {
            echo '<div class="row">
                          <div class="col">
                              <div class="row">
                                  <div class="col bg-primary border-bottom border-4">Wydążenie rozpoczyna się o' . $row['timeStart'] . ', zakończy się o ' . $row['timeEnd'] . '.</div>
                              </div>
                              <div class="row">
                                  <div class="col bg-secondary bg-gradient">' . $row['content'] . '</div>
                              </div>
                          </div>
                      </div>';
        }
        echo "</div>";
        if ($i % 3 == 2) {
            echo '</div>';
        }

    }

    echo '</div>';
    ?>

    <script src="navbar.js"></script>
    <script>
        activeItemOnNavbar('Strona główna');
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