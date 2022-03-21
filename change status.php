<?php

if (isset($_GET['idDone']) && isset($_GET['idEvent'])) {
    session_start();
    include "database/database connection.php";
    $sql = "update Event set isDone = {$_GET['idDone']} where idUser = {$_SESSION['idUser']} and idEvent = {$_GET['idEvent']};";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

header('Location: main.php');
