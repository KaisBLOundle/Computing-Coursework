<?php
include_once('connection.php'); 
$stmt = $conn->prepare("UPDATE  tblbankaccount SET CashBalance = :cashbalance");
$stmt->bindParam(':cashbalance', $_POST["newcash"]);
$stmt->execute();
header('Location: housebalance.php');
?>