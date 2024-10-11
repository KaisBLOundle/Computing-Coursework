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
    <li><a  href="login.php"><p class="white bannertext loginalign">Login</p></a></li>
    </ul>
</div>
</nav>

</html>
<?php

//	testChartphp

 	require_once 'chart.php';

	 array_map("htmlspecialchars", $_POST);
	 include_once("connection.php");
	 session_start();
	 $stmt = $conn->prepare("SELECT * FROM tblbalancetrack WHERE UserID LIKE :userid");
   	 $stmt->bindParam(':userid', $_SESSION["ID"]);
	 $stmt->execute();
	 $x=0;
	 $day=0;
	 while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	 {
	
	 //converts date value into unix time stamp (the number of seconds that has passed since 01/01/1970)
	 $day=strtotime($row['Date'] );
	 
	 //converts the unix time stamp into the number of days that has passed since 01/01/2024
	 $newday= $day - 1704067200;
	 $newday=$newday/86400;
	 //rounds the number to nearest integer
	 $newday=ceil($newday);
	 
	 
	 //creates an array of all the values in  tblBlanceTrack
	 $resultArray[$x]=array('x'=>$newday, 'y1'=>$row['Balance']);
	 $x=$x+1;
	  
	 


	 }  
?>

<!DOCTYPE html>
<html>
<head>
	<title>testChart</title>
	<xml version="1.0" encoding="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	

<?PHP
//sets the parameters for the x and y axis
	$chart = new Chart();
	$chart->setPixelSize(1500, 400, 2);
	$chart->setMinMaxX(0, 365, 1);					
	$chart->setMinMaxY(0.00, 300);
	
	// blue line
	$errorMessage = $chart->addNewLine(0, 0, 255); // blue
	foreach ($resultArray as $i=>$valueArray) {

		echo('<br>');
		$errorMessage = $chart->setPoint($valueArray['x'], $valueArray['y1'], strval($valueArray['x']));

	}
		

	
	$chart->show(5);

?>
	<br>
	<hr>

</body>
</html>
