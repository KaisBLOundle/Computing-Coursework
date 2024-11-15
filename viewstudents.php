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

<div class="row">
  <div class="col "> 
    <a href="updatestudents.php"><img class="button year" src="updateyears.png" alt=""></a>
  </div>
  <h1> View Students</h1>

  <!-- displays the tbl user as a table -->
  <table  border="1" cellpadding="3"  cellspacing="0 "class="centrepad">
  <td class="tblheader white" >Forename</td>
  <td class="tblheader white">Surename</td>
  <td class="tblheader"></td>
  <?php
  include_once('connection.php'); 
  $stmt= $conn->prepare("SELECT * FROM TblUsers");
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
  {  
  echo("<tr>");
  echo("<td>".$row["Forename"]."</td>".' '."<td>".$row["Surname"]."</td>");
  echo("<td>
  <form action='studentbalance.php' method='post' class='inputbox' >
  <input type='submit' value='View Balance'>");
  echo("<input type='hidden' value=".$row["UserID"]." name='UserID' ></form></td><br>");
  }
  }
  ?>

  </table>
</div>