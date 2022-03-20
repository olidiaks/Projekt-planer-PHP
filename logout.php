<?php
setcookie("email", "", time() - 3600, '/');
setcookie("password", "", time() - 3600, '/');
session_start();
$_SESSION['idUser'] = null;
header('Location: index.php');