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
<div class="row">
  <div class="col"></div>


<div class="row">
  <div class="col"></div>


  <div class="col text-center">
  <h1>Withdraw Money</h1>

<?php
  session_start();
  array_map("htmlspecialchars", $_POST);
  include_once("connection.php");
  
 
  # this select the users detials that match with the students userID
  
  $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE UserID LIKE :userID");
  $stmt->bindParam(':userID', $_SESSION["ID"]);
  $stmt->execute();

  # this will display the users balance on the page
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
  echo('<h1 class="balance ">  '.$row["Balance"].'</h1><br>');
  }
?>

<form action="withdrawaction.php" method="post" >
        
        <!-- This will allow the User to input the amount they want to withdraw-->
        <input type="text"  id="withdraw" name="withdraw"  size="29" placeholder="Enter the amount you wish to withdraw" min="0"  max="7"><br><br>
        <input type="date" id="date" name="date" size="27" placeholder="Enter the date of the withdrawel" ><br><br>
        <input type="hidden" id="type" name="type" value="1">
        <input type="hidden" id="confirm" name="confirm" value="0">
        
        
        
        <!-- This will submit the values to the next page-->
        <input  type="submit" value="Withdraw" class="withdraw">
    </form>
    </div>

    

  <div class="col"></div>
</div>

</body>
</html>