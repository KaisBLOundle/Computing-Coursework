<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <!-- Bootstrap CSS and custom styles -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
    /* Custom styles */
    body {
      background-image: url('Crosby House.jpg'); /* Replace with your background image path */
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .login-container {
      max-width: 400px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.15);
    }
    .loginbanner {
      width: 100%;
      max-width: 300px;
      margin: 0 auto 20px auto;
      display: block;
    }
    .login-form input.form-control {
      margin-bottom: 15px;
      height: 45px;
      font-size: 16px;
    }
    .login-form .btn-primary {
      width: 100%;
      height: 45px;
      font-size: 16px;
      background-color: #428bca;
      border-color: #357ebd;
    }
  </style>
</head>
<body>

<div class="login-container">
  <!-- Banner Image -->
  <img src="CrosbyBanner.png" class="loginbanner banner" alt="Banner">
  
  <!-- Login Form -->
  <form class="login-form" action="loginprocess.php" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="Pword" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>
