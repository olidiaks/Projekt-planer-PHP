<!doctype html>
<html lang="pl">
<?php include 'head.html'; ?>
<body class="bg-dark text-light">

<?php
session_start();

if (
    isset($_SESSION['idUser']) &&
    isset($_POST['content']) &&
    isset($_POST['date']) &&
    isset($_POST['timeStart']) &&
    isset($_POST['timeEnd']) &&
    isset($_POST['idEvent'])
) {
    include "database/database connection.php";

    $sql = "update Event set 
            content = '{$_POST['content']}',
            date = '{$_POST['date']}',
            timeStart = '{$_POST['timeStart']}',
            timeEnd = '{$_POST['timeEnd']}'
            where idEvent = {$_POST['idEvent']}
            and idUser = {$_SESSION['idUser']}";
    mysqli_query($con, $sql);
    mysqli_close($con);

    header('Location: main.php');
    exit();
}

if (isset($_SESSION['idUser']) && isset($_GET['idEvent'])) {
    include 'database/database connection.php';
    include 'navBar.php';

    $sql = "select content, timeStart, timeEnd, date from Event
            where idEvent = '{$_GET['idEvent']}' and idUser = '{$_SESSION['idUser']}'";

    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    ?>
    <div class="container">
        <form class="mt-3 needs-validation" novalidate method="post" action="edit%20event.php">

            <div class="mb-3 d-none">
                <label for="idEvent" class="form-label"></label>
                <input type="text" class="form-control" id="idEvent" name="idEvent" required
                       value="<?php echo $_GET['idEvent']; ?>">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nazwa wydarzenia</label>
                <input type="text" class="form-control" id="content" name="content" required
                       value="<?php echo $row['content'] ?>">
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Dzień, w którym odbywa się to wydarzenie</label>
                <input type="date" id="date" class="form-control" name="date" required
                       value="<?php echo $row['date'] ?>">
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="timeStart" class="form-label">Godzina rozpoczęcia wydarzenia</label>
                <input type="time" id="timeStart" class="form-control" name="timeStart" required
                       value="<?php echo $row['timeStart'] ?>">
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="timeEnd" class="form-label">Godzina zakończenia wydarzenia</label>
                <input type="time" class="form-control" id="timeEnd" name="timeEnd" required
                       value="<?php echo $row['timeEnd'] ?>">
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Edytuj</button>
        </form>
    </div>
    <script src="navbar.js"></script>
    <script>
        activeItemOnNavbar('Dodaj wydarzenie do kalendarza.');
    </script>
    <script src="forms-validation.js"></script>
<?php } ?>
</body>
</html>

<?php
if (empty($_SESSION['idUser'])) {
    header('Location: index.php');
}
?>
