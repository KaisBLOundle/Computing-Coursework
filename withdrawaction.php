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
<?php
    

    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    session_start();
    
    
    #This uses Sql to insert the inputted variables in the TblTransactions     
    $stmt = $conn->prepare("INSERT INTO TblTransactions (TransactionID,UserID,Date,Amount,Description,Type,Confirmed)VALUES (null,:id,:date,:withdraw,null,:typ,:confirm)");

    #This sets the code post variables as variables that can be inserted into the table
    $stmt->bindParam(':id', $_SESSION["ID"]);
    echo($_POST["withdraw"]);
    $stmt->bindParam(':withdraw', $_POST["withdraw"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':typ', $_POST["type"]);
    $stmt->bindParam(':confirm', $_POST["confirm"]);


    

    $stmt->execute();
    #creates a new variable of the users balance
    
    $newbalance=($_SESSION['balance']-$_POST['withdraw']);
    
   

    #updates the users balance in tblusers
    $stmt = $conn->prepare("UPDATE TblUsers SET Balance=:newbalance");
    $stmt->bindParam(':newbalance', $newbalance);
    $stmt->execute();
    unset($_SESSION['balance']);
    session_regenerate_id();
    $_SESSION['balance']= $newbalance;
    echo($_SESSION['balance']);
    unset($newbalance);
   


    #Saves a copy of the users balance to balance track
    $stmt = $conn->prepare("INSERT INTO tblbalancetrack(UserID,Balance,Year,Date)VALUES (:id,:balance,:year,:date)");
    $stmt->bindParam(':id', $_SESSION["ID"]);
    $stmt->bindParam(':balance', $_SESSION["balance"]);
    $stmt->bindParam(':year', $_SESSION["year"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->execute();


    $newcash=($_SESSION['Cash']-$_POST['withdraw']);
    
    #updates the amount of money in the housesafe
    $stmt = $conn->prepare("UPDATE  tblbankaccount SET CashBalance = :cashbalance");
    $stmt->bindParam(':cashbalance', $newcash);
    $stmt->execute();
  $conn=null;
            
?>
</body>
<html> 

<!-- This will create hyperlinks that the admin can use to return to the home page-->


<a href="StudentHome.php"><img class="addbutton padding" src="returnhome.png" alt="return home"></a>
</html>