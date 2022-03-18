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
    isset($_POST['timeEnd'])
) {
    include "database/database connection.php";
    $sql = "insert into Event (idUser, content, date, timeStart, timeEnd) 
            VALUE ('" . $_SESSION['idUser'] . "',
            '" . $_POST['content'] . "',
            '" . $_POST['date'] . "',
            '" . $_POST['timeStart'] . "',
            '" . $_POST['timeEnd'] . "')";
    if ($query = mysqli_query($con, $sql)) {
        mysqli_close($con);
        header('Location: main.php');
        exit();

    }

}

if (isset($_SESSION['idUser'])) {
    include 'database/database connection.php';
    include 'navBar.php';


    mysqli_close($con);
    ?>
    <div class="container">
        <form class="mt-3 needs-validation" novalidate method="post" action="add%20event.php">
            <div class="mb-3">
                <label for="content" class="form-label">Nazwa wydarzenia</label>
                <input type="text" class="form-control" id="content" name="content" required>
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Dzień, w którym odbywa się to wydarzenie</label>
                <input type="date" id="date" class="form-control" name="date" required>
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="timeStart" class="form-label">Godzina rozpoczęcia wydarzenia</label>
                <input type="time" id="timeStart" class="form-control" name="timeStart" required>
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="timeEnd" class="form-label">Godzina zakończenia wydarzenia</label>
                <input type="time" class="form-control" id="timeEnd" name="timeEnd" required>
                <div class="invalid-feedback">Pole powyżej jest wymagane.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Dodaj</button>
        </form>
    </div>
    <script src="navbar.js"></script>
    <script>
        activeItemOnNavbar('Dodaj wydarzenie do kalendarza');
    </script>
    <script src="forms-validation.js"></script>

    <?php
} else {
    header('Location: index.php');
}
?>
</body>
</html>