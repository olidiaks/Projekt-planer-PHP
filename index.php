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
    <form action="main.php" method="get">
        <div class="my-3">
            <label for="email" class="form-label">Adres email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nie podawaj nigdy, nikomu adresu email ani hasła.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="noLogout" name="noLogout">
            <label class="form-check-label" for="noLogout">Czy się nie wylogowywać</label>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
    </form>
</div>
</body>
</html>
