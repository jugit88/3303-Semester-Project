<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ypod</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">YPOD</a></div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.html" target="_self">Home</a> </li>
        <li><a href="Products.html" target="_self">Products</a> </li>
        <li><a href="dataServices.php" target="_self">Data Services</a> </li>
        <li><a href="Aboutus.html" target="_self">About Us</a> </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="signup.php" target="_self">Sign up</a> </li>
        <li><a href="signin.php" target="_self">Sign In</a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<div class="container">
  <div>
<div class="input-group">
    <div class="input-group"> </div>
  </div>
</div>

  <?php
 require('db.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $email = stripslashes($email);
 $email = mysql_real_escape_string($email);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 $trn_date = date("Y-m-d H:i:s");
 $checkQuery = "SELECT count(*) from `users` where `username` = '$username'";
 $findUser = mysql_query($checkQuery);
 $userExists = mysql_result($findUser,0) > 0;
 if ($userExists){
  echo "<div class='form'><h3>Username already exists, choose another username.</h3><br/>Click here to <a href='signup.php'>Register</a></div>";
  die();
 }

 $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
 $result = mysql_query($query);
 if($result and !$userExists){
 echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='signin.php'>Login</a></div>";
 
 }
 }else{
?>

<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<?php } ?>
</body>
</html>
