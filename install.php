<?php
$servername = 'localhost';
$username = 'root';
$password= '';
#No database name mentioned as the program will create the database

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE DATABASE IF NOT EXISTS houseBank";#creates database
$conn->exec($sql);


$sql = "USE houseBank";#selects the database to use
$conn->exec($sql);
echo "DB created successfully";

#creates the user table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE  tblusers  (
UserID  INT(3) UNSIGNED NOT NULL AUTO_INCREMENT , 
 Forename  VARCHAR(30) NOT NULL , 
 Surname  VARCHAR(30) NOT NULL , 
 Password  VARCHAR(30) NOT NULL DEFAULT 'Password' ,
 Username  VARCHAR(30) NOT NULL , 
 Year  INT(1) NOT NULL , 
 Balance  DECIMAL(6,2) NOT NULL DEFAULT 0.00, 
 Role  TINYINT(1) NOT NULL DEFAULT 0 , 
PRIMARY KEY ( UserID ));");
$stmt->execute();
$stmt->closeCursor();

echo("tblusers created");

#adds the administrator to the user table
$stmt = $conn->prepare("INSERT INTO  tblusers ( UserID ,  Forename ,  Surname ,  Password ,  Username ,  Year ,  Balance ,  Role ) 
VALUES ('1','Admin','Admin','Password','Admin','Admin','0000.00','1')");
echo("Admin Added");
$stmt->execute();
$stmt->closeCursor();

#creates the transaction table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tbltransactions; 
CREATE TABLE tbltransactions  ( TransactionID  INT(3) UNSIGNED NOT NULL AUTO_INCREMENT , 
 UserID  INT(5) NOT NULL ,  Date  INT NOT NULL ,  Amount  DECIMAL(6,2) NOT NULL , 
 Description  VARCHAR(40) NULL , 
 Type  TINYINT(1) NOT NULL DEFAULT '0' , 
 Confirmed  BOOLEAN NOT NULL DEFAULT FALSE , 
PRIMARY KEY ( TransactionID )) ENGINE = InnoDB;");
echo("Transaction Table Added");
$stmt->execute();
$stmt->closeCursor();


#creates balance track table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbalancetrack;CREATE TABLE  housebank . 
tblbalancetrack  ( BalancetrackID INT(3) UNSIGNED NOT NULL AUTO_INCREMENT ,UserID  INT NOT NULL ,  Balance  DECIMAL(6,2) NOT NULL ,  
Year  VARCHAR(10) NOT NULL , 
 Date  DATE NOT NULL , 
 PRIMARY KEY ( BalancetrackID )) ENGINE = InnoDB; ");
 echo("Balance Table Added");
 $stmt->execute();
 $stmt->closeCursor();
 
 #creates bank account table
 $stmt = $conn->prepare("DROP TABLE IF EXISTS tblbalancetrack;CREATE TABLE  housebank . 
 tblbankaccount (BankBalance  INT NOT NULL, CashBalance INT NOT NULL)");

 echo("Bank Account Table Added");


?>