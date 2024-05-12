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
    
    #this will choose what year will be inputted into the database depending on what the user selected on the last page.
    switch($_POST["Year"]){
        case "Thirdform":
            $year="Third";
            break;
        #This would make the user be in Third Form in the table
        
        case "Fourthform":
            $year="Fourth";
            
            break; 

        case "Fifthform":
            $year="Fifth";
            
            break;
            
        case "L6thform":
            $year="Lower Sixth";
            
            break; 
        
        case "U6thform":
            $year="Upper Sixth";
            
            break; 

    }

    #This uses Sql to insert the inputted variables in the TblUsers        
    $stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Forename,Surname,Password,Username,Balance,Year,Role)VALUES (null,:forename,:surname,default,:username,default,:year,default)");

    #This sets the code post variables as variables that can be inserted into the table
    $stmt->bindParam(':forename', $_POST["Forename"]);
    $stmt->bindParam(':surname', $_POST["Surname"]);
    $stmt->bindParam(':username', $_POST["Username"]);
    $stmt->bindParam(':year', $year);
    $stmt->execute();
$conn=null;
            
?>
</body>
<html> 

<!-- This will create hyperlinks that the admin can use to return to the home page-->
<a href="students.php"><img class="addbutton padding" src="Newuser.png" alt="add new user"></a><br>

<a href="Adminhome.php"><img class="addbutton padding" src="returnhome.png" alt="return home"></a>
</html>