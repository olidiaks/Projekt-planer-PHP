<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planer | login</title>
    <?php include 'bootstrap.html'; ?>
</head>
<body class="bg-dark text-light">
<div class="container">
    <form action="main.php" class="needs-validation" method="get" novalidate>
        <div class="my-3">
            <label for="email" class="form-label">Adres email</label>
            <input type="email" class="form-control border-2" id="email" name="email" aria-describedby="emailHelp"
                   required>
            <div class="valid-feedback">Adres email spełnia wszystkie warunki.</div>
            <div class="invalid-feedback">Adres email jest niepoprawny. Adres email musi zawierać @ oraz domenę,
                na której jest zarejestrowany. (przykłądowyAdresEmail@mojastrona.pl)
            </div>
            <div id="emailHelp" class="form-text">Nie podawaj nigdy, nikomu adresu email ani hasła.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" class="form-control border-2" id="password" name="password"
                   required autocomplete="current-password"
                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,60}$">
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
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="noLogout" name="noLogout">
            <label class="form-check-label" for="noLogout">Czy się nie wylogowywać</label>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
    </form>
</div>
<script src="login.js"></script>
</body>
</html>
