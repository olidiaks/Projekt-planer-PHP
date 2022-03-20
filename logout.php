<?php
session_start();
$_SESSION['idUser'] = null;
header('Location: index.php');