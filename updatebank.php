<?php
include_once('connection.php'); 
$stmt = $conn->prepare("UPDATE  tblbankaccount SET BankBalance = :cashbalance");
$stmt->bindParam(':cashbalance', $_POST["newbank"]);
$stmt->execute();
header('Location: housebalance.php');
?>