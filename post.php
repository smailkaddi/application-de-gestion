<?php
 
 $_SERVER['REQUEST_METHOD'];
if (isset( $_POST['name'] ) and isset($_POST['url'])and isset( $_POST['message'] )) {
echo  $_POST['name']  . "<br>" ;
echo   $_POST['url'] . "<br>" ;
echo  $_POST['message'] ."<br>" ;
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

 <div class="container">  
  <form id="contact" action="" method="post">
    <h3>post</h3>
    <h4> welcome</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus name= 'name'>
    </fieldset>
   
      <input placeholder="Your Web Site starts with http://" type="text" tabindex="4" required name= 'url' >
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your publications Here...." tabindex="5" required  name= 'message'></textarea >
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
  
</div>
</body>
</html>