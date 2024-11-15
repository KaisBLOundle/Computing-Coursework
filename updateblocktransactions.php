<?php
include_once('connection.php'); 
#changes the value of the confirmed value from 0 to 2
$stmt = $conn->prepare("UPDATE  TblTransactions SET Confirmed=2 WHERE TransactionID LIKE :transactionID");
$stmt->bindParam(':transactionID', $_POST["TransactionID"]);
$stmt->execute();
echo('transaction Blocked');
?>