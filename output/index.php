<?php
include('config.php');

?>
	<form action="" method="post">
		<input type="text" name="head">
		<textarea name="content"></textarea>
		<input type="text" name="author">
		<button type="submit"></button>
	</form>

<?


$head = $_POST['head']; 
$content = $_POST['content']; 
$author = $_POST['author']; 


// please remove last ' , (coma)' from fileds 

mysqli_query($conn,"INSERT INTO `blog` ( `head`,`content`,`author` ) VALUES ('$head','$content','$author')");

?>