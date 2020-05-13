

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database  ="login";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}
if(isset($_POST["resgister"])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  session_start();
  if($password = $password2 ){
    $password = md5($password);
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password','$password2' )";
    mysqli_query( $conn ,$sql);
    $_SESSION ['message'] = "you are now logged in";
    $_SESSION ['username'] = $username;
    header('location:post.php');
  }else{
  $_SESSION ['message'] = "the tow passord to not match";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=style.css >
</head>
<body>
<div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Log in</h2>
  <form action='home.php' method="POST" class="login-container">
    <p><input name ="username" type="text" placeholder="USER"></p>
    <p><input  name ="Email" type="email" placeholder="email"></p>
    <p><input  name ="password" type="password" placeholder="Password"></p>
    <p><input  name ="password2" type="password" placeholder="Password"></p>
    <p><input  name = "resgister"   type="submit"    value="Log in"></p>
  </form>
</div>
</body>
</html>