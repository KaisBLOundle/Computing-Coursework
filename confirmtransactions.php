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
    <li><a  href="viewstudents.php"><p class="white bannertext">View Students</p></a></li>
    <li><a  href="confirmtransactions.php"><p class="white bannertext">Confirm Transactions</p></a></li>
    <li><a  href="login.php"><p class="white bannertext loginalign">Login</p></a></li>
    </ul>
</div>
</nav>

<h1> Confirm Transactions</h1>

<!-- displays the students transactions in a table using the userid and transaction id  -->

<table  border="1" cellpadding="3"  cellspacing="0 "class="centrepad">
<td class="tblheader white" >Forename</td>
<td class="tblheader white" >Surname</td>
<td class="tblheader white">Amount</td>
<td class="tblheader white">Date</td>
<td class="tblheader white">Description</td>
<td class="tblheader"></td>
<td class="tblheader"></td>

<?php
include_once('connection.php'); 
#this will create a join statement that will link the TblUserTable and the TblTransaction table by the UserID and then display the values in a table
$stmt = $conn->prepare("SELECT TblTransactions.Amount as AMT, 
TblTransactions.Description as DESCR,TblTransactions.Date as TD, TblUsers.Surname as SN,TblUsers.Forename as FN, TblTransactions.TransactionID as TI, TblTransactions.Confirmed as CONF
FROM TblTransactions
INNER JOIN TblUsers on TblUsers.UserID= TblTransactions.UserID");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  
  if ($row["CONF"]==0){
  # only displayes transactions that have not been confirmed
 echo("<tr>");
echo("<td>".$row["FN"]."</td>".' '."<td>".$row["SN"]."</td>".' '."<td>".$row["AMT"]."</td>".' '."<td>".$row["TD"]."</td>".' '."<td>".$row["DESCR"]."</td>");
echo("<td>
<form action='updateconfirmtransactions.php' method='post' class='inputbox' >
<input type='submit' value='Confirm'>");
echo("<input type='hidden' value=".$row["TI"]." name='TransactionID' ></form></td>");
echo("<td>
<form action='updateblocktransactions.php' method='post' class='inputbox' >
<input type='submit' value='Block'>");
echo("<input type='hidden' value=".$row["TI"]." name='TransactionID' ></form></td>");
#this will submit the transaction ID to the next page where the transaction will be updated
}
}
?>
</table>

