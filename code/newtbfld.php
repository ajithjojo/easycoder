<?php
	include('../output/config.php');

	$fname = $_POST['fname'];
	$type = $_POST['type'];
	$tb = $_POST['tb'];
	$lst = $_POST['lst'];
 	

 	if($lst==NULL){
		mysqli_query($conn,"ALTER TABLE `$tb`  ADD `$fname` VARCHAR( 1000 ) NOT NULL  AFTER `tid`;");
	}
	else
	{
		mysqli_query($conn,"ALTER TABLE `$tb`  ADD `$fname` VARCHAR( 1000 ) NOT NULL  AFTER `$lst`;");
	}

header("location:../dbmaker.php?tbl=$tb&lst=$fname");

?>