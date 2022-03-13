<?php

if ($con = mysqli_connect('127.0.0.1', 'Projekt planer PHP', 'Z]J.5*Y/Y7n0Ptq7', 'Projekt planer PHP')) {
    echo mysqli_error($con);
    return 0;
}
include 'createDatabases.php';
