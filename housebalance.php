<!DOCTYPE html>
<html>
<head>
  
  <!-- Imports Style Sheets from bootstraps as well as linking to the local stylesheet-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <xml version="1.0" encoding="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
</head>
<body>

<!-- Admin Nav bar with links to all of the subpages for the admin-->
<nav class="navbar navbar-inverse redback  " >
<div class="container-fluid " >
    <div class="navbar-header "  >
    <img class="banner" src="CrosbyBanner.png" alt="OundleChoralSociety">
    </div>
    <ul class="nav navbar-nav right ">
    <li> <a  href="AdminHome.php"><p class="white bannertext">Home</p> </a></li>
    <li><a  href="#concerts&events"><p class="white bannertext">View Students</p></a></li>
    <li><a  href="#members"><p class="white bannertext">Confirm Transactions</p></a></li>
    <li><a  href="#contactus"><p class="white bannertext loginalign">Login</p></a></li>
    </ul>
</div>
</nav>

<?php
session_start();
array_map("htmlspecialchars", $_POST);
include_once("connection.php");



?>
<!-- displays the tbl user as a table -->
<table  border="1" cellpadding="3"  cellspacing="0 "class="centrepad">
<td class="tblheader white" >Cash</td>
<td class="tblheader white">Bank Account</td>

<?php
include_once('connection.php'); 
$stmt = $conn->prepare("SELECT * FROM tblbankaccount");
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  $_SESSION['Cash']=$row["CashBalance"];
  $_SESSION['Balance']=$row["BankBalance"];
#creates a table displaying the amount of cash in the bank account and the cash balance and allows the admin to manually update values
echo("<tr>");
echo("<td>".$row["CashBalance"]."</td>".' '."<td>".$row["BankBalance"]."</td>");
echo("<tr>");
echo("<td>
<form action='updatecash.php' method='post' class='inputbox' >
<input type='text'  id='newcash' name='newcash'  size='3' placeholder='Amount' min='0'  max='30'>
<input type='submit' value='Update'>");
echo("</form></td><br>");
echo("<td>
<form action='updatebank.php' method='post' class='inputbox' >
<input type='text'  id='newbank' name='newbank'  size='3' placeholder='Amount' min='0'  max='30'>
<input type='submit' value='Update'>");
echo("</form></td><br>");


}
?>
<a href=""></a>