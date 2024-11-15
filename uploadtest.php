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



<!-- The input boxes that will submit the new users information to the next page-->
<br>
<form action="importstudent.php" method="post" class="inputbox" enctype="multipart/form-data"><!-- specifies how the form data should be encoded when submitting to the server-->
        
        

        
        Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>

        
        <!-- This will submit the values to the next page-->
        <input type="submit" value="Add Student">
    </form>
</body>

</html>
