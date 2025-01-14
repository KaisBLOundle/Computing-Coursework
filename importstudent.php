<?php
array_map("htmlspecialchars", $_POST);
include_once("connection.php");
#creates the user table
$stmt = $conn->prepare("DROP TABLE IF EXISTS temptblusers;
CREATE TABLE  temptblusers  (
UserID  INT(3) UNSIGNED NOT NULL AUTO_INCREMENT , 
 Forename  VARCHAR(30) NOT NULL , 
 Surname  VARCHAR(30) NOT NULL , 
 Password  VARCHAR(30) NOT NULL DEFAULT 'Password' ,
 Username  VARCHAR(30) NOT NULL , 
 Year  VARCHAR(30) NOT NULL , 
 Balance  DECIMAL(6,2) NOT NULL DEFAULT 0.00, 
 Role  TINYINT(1) NOT NULL DEFAULT 0 , 
PRIMARY KEY ( UserID ));");
$stmt->execute();
$stmt->closeCursor();

$target_dir = "C:\\xampp\mysql\data\housebank";
//$target_dir = "files/";
    print_r($_FILES);
    print_r($target_dir);
    $target_file = $target_dir ."\\". basename($_FILES["piccy"]["name"]);#finding where the file is
    //$target_file = $target_dir . basename($_FILES["piccy"]["name"]);#finding where the file is
    echo $target_file;
    if (move_uploaded_file($_FILES["piccy"]["tmp_name"], $target_file)) {#stores file in temporary location
        echo "The file ". htmlspecialchars( basename( $_FILES["piccy"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }

$stmt= $conn->prepare("LOAD DATA INFILE 'test.csv'
INTO TABLE temptblusers 
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'");
$stmt->execute();

 ?>