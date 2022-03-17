<?php

$sql = "show tables like 'Users'";

$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) == 0) {
    $sql = '
        CREATE TABLE `Projekt planer PHP`.`Users` 
        ( `idUser` INT NOT NULL AUTO_INCREMENT ,
        `userName` VARCHAR(65) NOT NULL,
        `email` VARCHAR(65) NOT NULL ,
        `password` VARCHAR(65) NOT NULL ,
        PRIMARY KEY (`idUser`)) 
        ENGINE = InnoDB;
        ';
    mysqli_query($con, $sql);

}

$sql = "show tables like 'Event'";

$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) == 0) {
    $sql = '
        CREATE TABLE `Projekt planer PHP`.`Event`
        ( `idEvent` INT NOT NULL AUTO_INCREMENT , 
        `idUser` INT NOT NULL ,
        `content` VARCHAR(65) NOT NULL ,
        `date` DATE NOT NULL , 
        `time` TIME NOT NULL ,
        PRIMARY KEY (`idEvent`))
        ENGINE = InnoDB;
        ';

    mysqli_query($con, $sql);
}
