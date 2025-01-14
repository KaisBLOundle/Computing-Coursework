
<?php
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    
    #this will choose what year will be inputted into the database depending on what the user selected on the last page.
    
    $stmt = $conn->prepare("UPDATE  tblusers SET Year = Year + 1 WHERE Role = 0 ");
    $stmt->execute(); 

    
     
    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE Year = 8 ");
    $stmt->execute(); 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo("deleting User:");
        print_r($row);
        $stmt2 = $conn->prepare("DELETE FROM tblusers WHERE UserID LIKE :userid");
        $stmt2->bindParam(":userid", $row["UserID"]);
        $stmt2->execute();
        $stmt2 = $conn->prepare("DELETE FROM tbltransactions WHERE UserID LIKE :userid");
        $stmt2->bindParam(":userid", $row["UserID"]);
        $stmt2->execute();
        $stmt2 = $conn->prepare("DELETE FROM tblbalancetrack WHERE UserID LIKE :userid");
        $stmt2->bindParam(":userid", $row["UserID"]);
        $stmt2->execute();
    }
    
$conn=null;

?>