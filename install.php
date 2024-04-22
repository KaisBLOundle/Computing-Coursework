<?php
$servername = 'localhost';
$username = 'root';
$password= '';
#No database name mentioned as the program will create the database

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE DATABASE IF NOT EXISTS Toilets";#creates database
$conn->exec($sql);


$sql = "USE Toilets";#selects the database to use
$conn->exec($sql);
echo "DB created successfully";

#creates the user table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE `housebank`.`tblusers` (`UserID` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT , 
`Forename` VARCHAR(30) NOT NULL , `Surname` VARCHAR(30) NOT NULL , 
`Password` VARCHAR(30) NOT NULL DEFAULT 'Password' , `Username` VARCHAR(30) NOT NULL , 
`Year` VARCHAR(30) NOT NULL , `Balance` DECIMAL(6,2) NOT NULL , 
`Role` TINYINT(1) NOT NULL DEFAULT '0' , 
PRIMARY KEY (`UserID`)) ENGINE = InnoDB;");
echo("tblusers created");

#adds the administrator to the user table
$stmt = $conn->prepare("INSERT INTO `tblusers`(`UserID`, `Forename`, `Surname`, `Password`, `Username`, `Year`, `Balance`, `Role`) 
VALUES ('1','Admin','Admin','Password','Admin','Admin','0000.00','1')");
echo("Admin Added");










$stmt->execute();
$stmt->closeCursor();
?>