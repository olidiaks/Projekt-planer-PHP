<!DOCTYPE html>
<html lang="pl">
<?php include "head.html"; ?>

<body class="bg-dark text-light">
<?php

if ($_POST && isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    include 'database/database connection.php';

    $sql = "select idUser from Users where email = '$email' and password = '$password'";

    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) == 1) {
        $idUser = mysqli_fetch_array($query)['idUser'];

        $_SESSION['idUser'] = $idUser;

        include "navBar.php";
        ?>

        <script src="navbar.js"></script>
        <script>
            activeItemOnNavbar('Strona główna');
        </script>
    <?php } else {
        echo '<div class="container">
                <div class="alert alert-danger mt-3">Nie ma konta o takim e–mailu lub haśle.</div>
            </div>';
    }
    mysqli_close($con);
} else {
    echo '<div class="container">
                <div class="alert alert-danger mt-3">
                    Nie ma wszystkich potrzebnych danych potrzebnych do zalogowania się.
                </div>
           </div>';
    include 'index.php';
} ?>
</body>
</html>