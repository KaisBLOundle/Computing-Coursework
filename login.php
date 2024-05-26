<!DOCTYPE html>
<html>
<head>
  
   <title>Login</title>
   <!-- Imports Style Sheets from bootstraps as well as linking to the local stylesheet-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body class="background">
<br>
<br>
<img src="CrosbyBanner.png" class="loginbanner banner " alt="">
<form class="inputbox" action="loginprocess.php" method= "POST">

<!-- Input boxes for the login-->
<input class="logintext" type="text" name="username" placeholder="Username"><br><br>
<input class="logintext" type="password" name="Pword" placeholder="Password"><br>
  <input class="login"type="submit" value="Login">
</form>
</div>

</body>
</html>