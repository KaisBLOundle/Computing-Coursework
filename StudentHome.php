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

<!-- User Nav bar with links to all of the subpages for the User-->
<nav class="navbar navbar-inverse redback  " >
<div class="container-fluid " >
    <div class="navbar-header "  >
    <img class="banner" src="CrosbyBanner.png" alt="OundleChoralSociety">
    </div>
    <ul class="nav navbar-nav right ">
    <li> <a  href="StudentHome.php"><p class="white bannertext">Home</p> </a></li>
    <li><a  href="#concerts&events"><p class="white bannertext">Deposit</p></a></li>
    <li><a  href="#members"><p class="white bannertext">View Balance</p></a></li>
    <li><a  href="#contactus"><p class="white bannertext loginalign">Change Password</p></a></li>
    <li><a  href="#contactus"><p class="white bannertext loginalign">Login</p></a></li>
    </ul>
</div>
</nav>

<?php
  session_start();
  array_map("htmlspecialchars", $_POST);
  include_once("connection.php");
 
  # this select the users detials that match with the students userID
  
  $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE UserID LIKE :userID");
  $stmt->bindParam(':userID', $_SESSION["ID"]);
  $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
  echo('<h1> Hello '.$row["Forename"].' '.$row["Surname"].'</h1><br>');
  }
?>

<div class="container-fluid centre">
    <a href="withdraw.php" ><img class="addbutton padding " src="withdraw.png" alt="withdraw"></a>
</div>

<div class="container-fluid centre">
    <a href="deposit.php" ><img class="addbutton padding" src="deposit.png" alt="deposit"></a>
</div>



</body>