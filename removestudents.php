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
    <li><a  href="#concerts&events"><p class="white bannertext">View Students</p></a></li>
    <li><a  href="#members"><p class="white bannertext">Confirm Transactions</p></a></li>
    <li><a  href="#contactus"><p class="white bannertext loginalign">Login</p></a></li>
    </ul>
</div>
</nav>

</body>
    <!-- displays the tbl user as a table -->
<table  border="1" cellpadding="3"  cellspacing="0 "class="centrepad">
<td class="tblheader white" >Forename</td>
<td class="tblheader white">Surename</td>
<td class="tblheader"></td>
<?php
include_once('connection.php'); 
$stmt = $conn->prepare("SELECT * FROM TblUsers");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo("<tr>");
echo("<td class='tblbody'>".$row["Forename"]."</td>".' '."<td class='tblbody'>".$row["Surname"]."</td>".'<td class="tblbody"><form action="studentbalance.php" method="post" class="inputbox" ><input class="removetext"type="submit" value="REMOVE"></form></td>'."<br>");
}
?>
</table>

</html>