<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php include "bootstrap.html"; ?>
</head>
<body>
<?php
include "navBar.html";


if ($con = mysqli_connect('127.0.0.1', 'Projekt planer PHP', 'Z]J.5*Y/Y7n0Ptq7', 'Projekt planer PHP')) {
    include 'database/createDatabases.php';
} else {
    echo $con;
    return 0;
}

?>

<script src="navbar.js"></script>
<script>
    activeItemOnNavbar('Strona główna');
</script>
</body>
</html>