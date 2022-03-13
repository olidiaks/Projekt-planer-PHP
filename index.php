<!doctype html>
<html lang="pl">
<?php include 'head.html'; ?>

<body class="bg-dark text-light">

<?php

if ($_POST) {

    $userName = $_POST['userName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if (
        empty($_POST['userName']) ||
        empty($_POST['email']) ||
        empty($_POST['password']) ||
        empty($_POST['confirmPassword']) ||
        //str_contains sprawdza, czy dany znak znajduje się w łani cuchu
        !str_contains($email, '@') ||
        strlen($password) < 8 ||
        strlen($password) > 65 ||

        //preg_match sprawdza, czy string zawiera znaki z danego schematu.
        !preg_match('@[A-Z]@', $password) ||
        !preg_match('@[a-z]@', $password) ||
        !preg_match('@[^\w]@', $password) ||
        !preg_match('@[0-9]@', $password)
    ) {
        echo '<h1 class="text-center text-warning">Czy ty na serio myślałeś, że uda ci się obejść walidacje.</h1>' .
            '<h1 class="text-center text-warning">Usuwając zabezpieczenia z frontend-u. To </h1>' .
            '<h1 class="text-center text-warning">To się mylisz!</h1>';
        include "register.php";
        return 0;
    }

    if ($password != $confirmPassword) {
        echo '
                <div class="container">
                    <div class="alert alert-danger text-center mt-3" role="alert">Hasła nie są takie same.</div>
                </div>
            ';
        include "register.php";
        return 0;
    }

    include 'database/database connection.php';

    $sql = "insert into Users (userName, login, password) VALUE ('$userName', '$email', '$password')";

    mysqli_query($con, $sql);

}

?>

<div class="container">
    <form action="main.php" class="needs-validation" method="post" novalidate>
        <div class="my-3">
            <label for="email" class="form-label">Adres email</label>
            <input type="email" class="form-control border-2" id="email" name="email" aria-describedby="emailHelp"
                   required maxlength="65">
            <div class="valid-feedback">Adres email spełnia wszystkie warunki.</div>
            <div class="invalid-feedback">Adres email jest niepoprawny. Adres email musi zawierać @ oraz domenę,
                na której jest zarejestrowany oraz nie może być dłuższy niż 65 znaków. (przykładowyAdresEmail@planer.pl)
            </div>
            <div id="emailHelp" class="form-text">Nie podawaj nigdy, nikomu adresu email ani hasła.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" class="form-control border-2" id="password" name="password"
                   required autocomplete="current-password"
                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,65}$">
            <div class="valid-feedback">Hasło spełnia wszystkie warunki</div>
            <div class="invalid-feedback">
                Hasło musi się składać z:
                <ul>
                    <li>Conajmniej jednej małej litery.</li>
                    <li>Conajmniej jednej dużej litery.</li>
                    <li>Conajmniej jednej cyfry.</li>
                    <li>Conajmniej jednego znaku specjalnego (! @ # $ % ^ & * _ = + -).</li>
                    <li>Musi składać się z minimalnie 8 znaków, a maksymalnie 60 znaków.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col order-1 justify-content-sm-between">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input border-info" id="noLogout" name="noLogout">
                    <label class="form-check-label text-info" for="noLogout">Czy chcesz się nie wylogowywać</label>
                </div>
            </div>
            <div class="col order-2 order-sm-3">
                <button type="submit" class="btn btn-primary">Zaloguj się</button>
            </div>
            <div class="col order-3 order-sm-2">
                <a href="register.php" class="link-info">
                    Nie masz konta to nic, zarejestruj się teraz.
                </a>
            </div>
        </div>
    </form>

</div>
<script src="forms-validation.js"></script>
</body>
</html>
