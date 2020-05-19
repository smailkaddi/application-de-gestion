
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="blog_post";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// $result = mysqli_query($conn,"SELECT * form post  ");

	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'blog_post');

  // initialize variables
    $image = "";
    $title = "";
    $slug = "";
    $body = "";
	  $id = 0;
	// $update = false;

	if (isset($_POST['save'])) {
        $image = $_POST['image'];
		    $title = $_POST['title'];
        $slug = $_POST['slug'];
        $body = $_POST['body'];
      

		mysqli_query($conn, "INSERT INTO posts (title, slug, body) VALUES ('$title', '$slug','$body,$image')"); 
		$_SESSION['message'] = "post saved"; 
		header('location: homeuser.php');
    }

    if (isset($_GET['del'])) {
      $id = $_GET['del'];
      mysqli_query($conn, "DELETE FROM posts WHERE id=$id");
      $_SESSION['message'] = "Post deleted!"; 
      header('location: homeuser.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/bootstrap-them.min.css">
    <link rel="stylesheet" href="public/css/css.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="navbar navbar-bright navbar-fixed-top" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="home.php" class="navbar-brand">Home</a>
      </div>
      <nav class="collapse navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
          <li>
            <a  href="home.php">logout</a>
          </li>
          <li>
            <a href="#">Contact us</a>
          </li>
        </ul>
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <ul class="dropdown-menu" style="padding:12px;">
              <form class="form-inline">
                <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
              </form>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <div id="masthead">  
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1>publication
            <p class="lead"></p>
          </h1>
        </div>
        <div class="col-md-5">
            <div class="row">
              <div class="col-sm-12">
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div><!-- /cont -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="top-spacer"> </div>
        </div>
      </div> 
    </div><!-- /cont -->
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <div class="panel">
          <div class="panel-body">                
              <?php $results = mysqli_query($conn, "SELECT * FROM posts"); ?>
              <table>
                <thead>
                <tr>
                <!-- <th>images</th> -->
                <th>title</th>
                <th>slug</th>
                <th>body</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
              <tr>      
               
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['slug']; ?></td>
                <td><?php echo $row['body']; ?></td>
                <td>
                  <a href="create_post.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                  <a href="homeuser.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </table>
         
  <a  href="create_post.php" > <button type="submit" class="btn" name="login_user">Post</button></a>

         </div>
        </div>                                           
       </div><!--/col-12-->
    </div>
  </div>                                                                            
  <hr>
  <div class="container" id="footer">
    <div class="row">
      <div class="col col-sm-12">
        
        <h1>Follow Us</h1>
        <div class="btn-group">
         <a class="btn btn-twitter btn-lg" href="#"><i class="icon-twitter icon-large"></i> Twitter</a>
       <a class="btn btn-facebook btn-lg" href="#"><i class="icon-facebook icon-large"></i> Facebook</a>
       <a class="btn btn-google-plus btn-lg" href="#"><i class="icon-google-plus icon-large"></i> Google+</a>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <hr>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <ul class="list-inline">
            <li><i class="icon-facebook icon-2x"></i></li>
            <li><i class="icon-twitter icon-2x"></i></li>
            <li><i class="icon-google-plus icon-2x"></i></li>
            <li><i class="icon-pinterest icon-2x"></i></li>
          </ul>
        </div>
        <div class="col-sm-12">
             <p> by ismail &copy; <?php echo date('Y'); ?></p>
        </div>
      </div>
    </div>
  </footer>
      <script src="public/js/jquery.min.js"></script>
      <script src="public/js/bootstrap.min.js" > </script>
</body>
</html>