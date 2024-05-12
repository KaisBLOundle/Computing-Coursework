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

<h1> Add Student</h1>

<!-- The input boxes that will submit the new users information to the next page-->
<form action="addstudents.php" method="post" class="inputbox">
        
        

        <input type="text"  id="forename" name="Forename"  size="27" placeholder="Enter Students First Name" min="0"  max="30"><br><br>
        <input type="text" id="surname" name="Surname" size="27" placeholder="Enter Students Surname" min="0"  max="30" ><br><br>
        <input type="text" id="username" name="Username" size="27" placeholder="Enter Students email up until the @" min="0"  max="30"><br><br>
        
        <!-- This will allow the User to select what year the student will be in-->
        <label for="Year">Enter Students Year</label><br>
        <input   type="radio"  id="Year" name="Year"  value="Thirdform"><p>Third Form</p>
        <input  id="Year" type="radio" value="Fourthform" name="Year"><p>Fourth Form</p>
        <input  id="Year" type="radio" value="Fifthform" name="Year"  ><p>Fifth Form</p>
        <input  id="Year" type="radio" value="l6thform" name="Year"  ><p>Lower Sixth </p>
        <input  id="Year" type="radio" value="U6thform" name="Year" ><p>Upper Sixth </p>
        
        <!-- This will submit the values to the next page-->
        <input type="submit" value="Add Student">
    </form>
</body>

</html>
