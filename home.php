<?php
session_start();
$admins = array('ismail','walid','ahmed','ali');
if($_SERVER['REQUEST_METHOD']== 'POST'){
   $user =  $_POST['username'];
  
     if(empty($_SESSION['index'])){
        $_SESSION['index'] = 1;
     }else{
     $_SESSION['index'] ++;
     }
   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/bootstrap-them.min.css">
    <link rel="stylesheet" href="public/css/css.css">
    <!-- Bootstrap CSS -->
    <title>Hello</title>
  </head>
  <body>
  <h1>    <?php    if(in_array($user,$admins)){
     $_SESSION['user'] = $user;
              
              
   }  else{
    echo 'sorry you are not user here'   ;
  }
}else{
    echo "ERROR/ you can't browose this page";
}?>   </h1>
  <div class="container">
          <div class="row">
            <div class="col-md-7">
               <h1>  <?php echo "welcome " . $_SESSION['user'] ;   echo '<div> you viewed this page '. $_SESSION ['index'] . 'times';?>   </h1> 
                <p class="lead"></p>
              </h1>
            </div>
    <div class="container">
       <div class="row">
       <div class="col-md-12">
        <div class="top-spacer"> </div>
 >
        <a href="post.php" class="btn btn-primary" > post her   </a>  
      </div>
      </div><!--/col-12-->
      </div>
      </div>          

    <script src="public/js/jquery.min.js"></script>
      <script src="public/js/bootstrap.min.js" > </script>
  </body>
</html>
   
  
