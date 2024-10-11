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
    <li><a  href="login.php"><p class="white bannertext loginalign">Login</p></a></li>
    </ul>
</div>
</nav>

    
      
</body>
<!-- Buttons for admin-->

<!-- Link to  add students page-->
  <div class="container-fluid centre">
      <a href="students.php" ><img class="addbutton padding " src="Addstudents.png" alt="addstudents"></a>
    </div>
  <!-- Link to  remove students page-->
    <div class="container-fluid centre">
      <a href="removestudents.php" ><img class="addbutton padding" src="Removestudents.png" alt="removestudents"></a>
    </div>
  <!-- Link to  view students page-->
    <div class="container-fluid centre">
      <a href="viewstudents.php" ><img class="addbutton padding" src="Viewstudents.png" alt="Viewstudents"></a>
    </div>

   
    <!-- Link to transactions page-->
    <div class="container-fluid centre">
      <a href="confirmtransactions.php" ><img class="addbutton padding" src="Confirmtrans.png" alt="Confirm Transactions"></a>
    </div>
    <!-- Link to transactions page-->
    <div class="container-fluid centre">
      <a href="housebalance.php" ><img class="addbutton padding" src="Housebank.png" alt="Confirm Transactions"></a>
    </div>
</html>