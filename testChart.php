<?php

//	testChartphp

 	require_once 'chart.php';

	 array_map("htmlspecialchars", $_POST);
	 include_once("connection.php");
	 session_start();
	 $stmt = $conn->prepare("SELECT * FROM tblbalancetrack");
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
	  
	 

	// y1 for the blue line, y2 for the red line
	// xlabel is not used in this example, see below

	
	/* $resultArray[0]  = array('x'=>0, 'xlabel'=>'', 'y1'=>2000, 'y2'=>1600); // x = days since 01.01
	$resultArray[1]  = array('x'=>31, 'xlabel'=>'JAN', 'y1'=>1800, 'y2'=>1700);
	$resultArray[2]  = array('x'=>59, 'xlabel'=>'FEB', 'y1'=>1700, 'y2'=>1800);
	$resultArray[3]  = array('x'=>90, 'xlabel'=>'MAR', 'y1'=>1400, 'y2'=>1600);
	$resultArray[4]  = array('x'=>120, 'xlabel'=>'APR', 'y1'=>1250, 'y2'=>1400);
	$resultArray[5]  = array('x'=>151, 'xlabel'=>'MAY', 'y1'=>1900, 'y2'=>1300);
	$resultArray[6]  = array('x'=>181, 'xlabel'=>'JUN', 'y1'=>2050, 'y2'=>1500);
	$resultArray[7]  = array('x'=>212, 'xlabel'=>'JUL', 'y1'=>2200, 'y2'=>1700);
	$resultArray[8]  = array('x'=>243, 'xlabel'=>'AUG', 'y1'=>2100, 'y2'=>1900);
	$resultArray[9]  = array('x'=>273, 'xlabel'=>'SEP', 'y1'=>2300, 'y2'=>1800);
	$resultArray[10] = array('x'=>304, 'xlabel'=>'OCT', 'y1'=>2350, 'y2'=>2000);
	$resultArray[11] = array('x'=>334, 'xlabel'=>'NOV', 'y1'=>2400, 'y2'=>2100);
	$resultArray[12] = array('x'=>365, 'xlabel'=>'DEC', 'y1'=>2450, 'y2'=>2200);
	
	// for the green line
	$resultGreenArray[0] = 1500;
	$resultGreenArray[1] = 1900;
	$resultGreenArray[2] = 1800;
	$resultGreenArray[3] = 1500;
	$resultGreenArray[4] = 1400;  */
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
	<h1>testChart</h1>
	<hr>
	<br>

<?PHP
print_r($resultArray);
	$chart = new Chart();
	$chart->setPixelSize(1500, 400, 2);
	$chart->setMinMaxX(0, 365, 1);					
	$chart->setMinMaxY(0.00, 300);
	
	// blue line
	$errorMessage = $chart->addNewLine(0, 0, 255); // blue
	foreach ($resultArray as $i=>$valueArray) {
		print_r($valueArray);
		echo('<br>');
		$errorMessage = $chart->setPoint($valueArray['x'], $valueArray['y1'], strval($valueArray['x']));
// if you prefer the xlabel text values, make the previous line comment and uncomment the next line
//		$chart->setPoint($valueArray['x'], $valueArray['y1'], $valueArray['xlabel']); 
	}
		
	// red line
	/* $errorMessage = $chart->addNewLine(255, 0, 0); // red
	foreach ($resultArray as $i=>$valueArray) {
		$errorMessage = $chart->setPoint($valueArray['x'], $valueArray['y2'], '');
	}
		
	// green line
	$errorMessage = $chart->addNewLine(0, 255, 0); // green
	$chart->setMinMaxX(0, 4, 0);
	foreach ($resultGreenArray as $i=>$value) {
		$errorMessage = $chart->setPoint($i, $value, '');
	}
 */
	// show
	
	$chart->show(5);

?>
	<br>
	<hr>

</body>
</html>
