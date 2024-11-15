<?php
 $stmt= $conn->prepare("SELECT * FROM TblUsers");
 $stmt->execute();
for i in_table()
?>
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