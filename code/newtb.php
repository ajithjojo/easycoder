<?php
	include('../output/config.php');

	$newtbname = $_POST['newtbname'];
	mysqli_query($conn,"CREATE TABLE `$newtbname` (`tid` int(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
 	mysqli_query($conn,"ALTER TABLE `$newtbname` ADD PRIMARY KEY (`tid`);");
 	mysqli_query($conn,"ALTER TABLE `$newtbname` CHANGE `tid` `tid` INT(100) NOT NULL AUTO_INCREMENT;");

header("location:../dbmaker.php?tbl=$newtbname");

?>