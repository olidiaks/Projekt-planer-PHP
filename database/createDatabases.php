<?php

$sql = 'show tables like "user"';

$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) == 0) {
    $sql = '
CREATE TABLE `Projekt planer PHP`.`Users` 
( `idUser` INT NOT NULL AUTO_INCREMENT ,
`login` VARCHAR(65) NOT NULL ,
`password` VARCHAR(65) NOT NULL ,
PRIMARY KEY (`idUser`)) 
ENGINE = InnoDB;
';
}