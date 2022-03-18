<?php
session_start();
if ($_GET['idEvent'] && $_SESSION['idUser']) {
    include 'database/database connection.php';
    $sql = "delete FROM Event where idEvent = {$_GET['idEvent']} and idUser = {$_SESSION['idUser']}";
    mysqli_query($con, $sql);
    mysqli_close($con);
}
header('Location: main.php');
