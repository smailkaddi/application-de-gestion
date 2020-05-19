<?php
$conn = new mysqli("localhost", "root", "","blog_post");

// Check connection
if (!$conn) {

  die("Connection failed: ");
  }
?> 