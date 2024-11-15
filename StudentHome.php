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





<div class="row">
<div class="col "> 
  
  <a href="Studentgraph.php"><img class="addbutton rightpad" src="StudentGraph.png" alt=""></a>
</div>


  <div class="col text-center">
  
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
  
<div class="container-fluid ">
    <a href="withdraw.php" ><img class="addbutton  " src="withdraw.png" alt="withdraw"></a>
</div>

<div class="container-fluid ">
    <a href="deposit.php" ><img class="addbutton padding" src="deposit.png" alt="deposit"></a>
</div>
<br>


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
    $stmt->bindParam(':id', $_SESSION["ID"]);
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
      $confirmed=("<td ><p class=''>False</p></td>");
      # if the value of the confirmed variable is 0 then it will displayed as false 
      
  }
  elseif($row['Confirmed']== "2"){
      
    $confirmed=("<td ><p class='red'>Blocked</p></td>");#displayed as blocked
  
  
}  
  else{
      
        $confirmed=("<td class='green'>True</td>");#otherwise it will be displayed as true 
      
  }

    #creates a table with all of the users transactions in the database 
    echo("<tr>");
    echo("<td>".$row["Date"]."</td>".' '."<td>".$row["Amount"]."</td>".' '."<td>".$row["Description"]."</td>".' '."<td>".$type."</td>".' '.$confirmed);
    
    
    }
  ?>
  </table>
</div>
</div>
</div>



</body>