<?php
session_start(); 
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Username =:username ;" );
$stmt->bindParam(':username', $_POST['username']);
$stmt->execute();
#selects row from tblusers where the username matches the username inputted into the login page
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    if($row['Password']== $_POST['Pword']){
    #checks if password inputted matches the password inputted on the previous page
        $_SESSION['ID']=$row["UserID"];
        $_SESSION['balance']=$row["Balance"];
        #sets the users id and balance as a session variable
        
        if($row['Role']== "1"){
            header('Location: AdminHome.php');
            # if the user is an admin the login page directs them to the admin homepage
        }else{
            header('Location: StudentHome.php');#otherwise they are directed to the student home page
        }
        

    }else{

        header('Location: login.php');
        echo("Please try again");
    }
}
$conn=null;
?>
<p>Incorrect Username</p>
<a href="login.php">Please login again</a>
