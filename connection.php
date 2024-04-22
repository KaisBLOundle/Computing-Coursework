<?php
#Setting the variables that are needed to connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "housebank";#Databasename

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    #connecting to the database by checking the variables

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected: " ;
    #The computer will send a message when connected succesfully
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    #An error message is displayed if the database is not connected successfully
?>
