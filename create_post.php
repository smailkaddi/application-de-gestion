<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'blog_post');

	// initialize variables
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
   
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
            $image = $n['image'];
            $title = $n['title'];
            $slug = $n['slug'];
            $body = $n['body'];
          
		}
    }    
     if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $image = $_POST['image'];
	   $title = $_POST['title'];
         $slug = $_POST['slug'];
        $body = $_POST['body'];
    
      mysqli_query($conn, "UPDATE posts SET image='$image', title='$title', slug='$slug',body='$body' WHERE id=$id");
      $_SESSION['message'] = "Address updated!"; 
      header('location: homeuser.php');
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>hello world</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	<form method="post" action="create_post.php" >
            
    <div class="input-group">
			<label></label>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		</div>
        <div class="input-group">
			<label>image</label>
			<input type="text" name="image" value="<?php echo $image; ?>">
		</div>
		<div class="input-group">
			<label>title</label>
			<input type="text" name="title" value="<?php echo $title; ?>">
		</div>
		<div class="input-group">
			<label>slug</label>
			<input type="text" name="slug" value="<?php echo $slug; ?>">
        </div>
        <div class="input-group">
			<label>body</label>
            <textarea  placeholder="Message" name="body"  value="<?php echo $body; ?>">  </textarea><br />
		</div>
		<div class="input-group">
        <?php if ($update == true): ?>
	    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
        <?php else: ?>
	    <button class="btn" type="submit" name="save" >Save</button>
        <?php endif ?>
        </div>
       
	</form>
</body>
</html>

