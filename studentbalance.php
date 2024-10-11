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
array_map("htmlspecialchars", $_POST);
include_once("connection.php");

echo($_POST["UserID"]);
$stmt = $conn->prepare("SELECT * FROM TblUsers WHERE UserID LIKE :userid");
$stmt->bindParam(':userid', $_POST["UserID"]);
$stmt->execute();

echo('<h1> Sergey Schkolnik</h1>');



?>

<?php

//	testChartphp

 	require_once 'chart.php';

	 array_map("htmlspecialchars", $_POST);
	 include_once("connection.php");
	 session_start();
	 $stmt = $conn->prepare("SELECT * FROM tblbalancetrack WHERE UserID LIKE :userid");
   $stmt->bindParam(':userid', $_POST["UserID"]);
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
<div class="container-fluid ">
  <table  border="1" cellpadding="3"  cellspacing="0 "class="centrepad">
  <td class="tblheader white" >Date</td>
  <td class="tblheader white">Amount</td>
  <td class="tblheader white"> Description</td> <!-- headers for the table-->
  <td class="tblheader white"> Type</td>
  <td class="tblheader white"> Confirmed</td>
  <?php
    include_once('connection.php'); 
    $stmt = $conn->prepare("SELECT * FROM TblTransactions WHERE UserID LIKE :id "); # selects the transactions from the table that match the userID
    $stmt->bindParam(':id', $_POST["UserID"]);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      if($row['Type']== "1"){
        $type=("Withdrawal");
        # if the value of type is 1 then it will be displayed as a withdrawel in the table
        
    }else{
        $type=("Deposit");#otherwise it will displayed as 0
    }
    
    if($row['Confirmed']== "0"){
      $confirmed=("False");
      # if the value of the confirmed variable is 0 then it will displayed as false 
      
  }else{
      
        $confirmed=("True");#otherwise it will be displayed as true 
      
      
  }

    #creates a table with all of the users transactions in the database 
    echo("<tr>");
    echo("<td>".$row["Date"]."</td>".' '."<td>".$row["Amount"]."</td>".' '."<td>".$row["Description"]."</td>".' '."<td>".$type."</td>".' '."<td>".$confirmed."</td>");
    
    
    }
  ?>
  </table>
</div>
</div>
</div>

</body>
</html>
