<!DOCTYPE html>
<html lang="pl">
<?php include 'head.html' ?>

<body class="bg-dark text-light">
<div class="container">
    <form action="index.php" class="needs-validation" method="post" id="register-form" novalidate>
        <div class="my-3">
            <label for="userName" class="form-label">Nazwa użytkownika</label>
            <input type="text" class="form-control border-2" id="userName" name="userName" required maxlength="65">
            <div class="valid-feedback">Nazwa użytkownika spełnia wszystkie wymogi.</div>
            <div class="invalid-feedback">Nazwa użytkownika nie może być dłuższa niż 65 znaków.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adres email</label>
            <input type="email" class="form-control border-2" id="email" name="email" aria-describedby="emailHelp"
                   required maxlength="65">
            <div class="valid-feedback">Adres email spełnia wszystkie warunki.</div>
            <div class="invalid-feedback">Adres email jest niepoprawny. Adres email musi zawierać @ oraz domenę,
                na której jest zarejestrowany oraz nie może być dłuższy niż 65 znaków. (przykładowyAdresEmail@planer)
            </div>
            <div id="emailHelp" class="form-text">Nie podawaj nigdy, nikomu adresu email ani hasła.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" class="form-control border-2" id="password" name="password"
                   required autocomplete="new-password"
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
                    <li>Hasła muszą się pokrywać</li>
                </ul>
            </div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Powtórz hasło</label>
            <input type="password" class="form-control border-2" id="confirmPassword" name="confirmPassword"
                   required autocomplete="new-password"
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
                    <li>Hasła muszą się pokrywać</li>
                </ul>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Zarejestruj się</button>
    </form>
</div>
<script src="forms-validation.js"></script>
</body>
</html>