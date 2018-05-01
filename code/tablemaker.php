<?
include('../output/config.php');

$newtbname = $_POST['newtbname'];
$name = $_POST['name'];

$lst = $_POST['lst'];
$tbn = $_GET['tbn'];

	if($newtbname==NULL)
	{
		// create rows
		if($tbn==NULL)
		{ } else{

			
?>
<form action="?tbn=<? echo $tbn; ?>" method="post">
		<input type="text" name="name" placeholder="name">
		<input type="hidden" name="lst" value="<? echo $name; ?>">
		<input type="hidden" name="tbn" value="<? echo $tbn; ?>">
		<input type="submit" name="">
	</form>
<?
			


 		if($lst==NULL){
		mysql_query("ALTER TABLE `$tbn`  ADD `$name` VARCHAR(1000) NOT NULL  AFTER `tid`;");
	}
	else
	{
		mysql_query("ALTER TABLE `$tbn`  ADD `$name` VARCHAR(1000) NOT NULL  AFTER `$lst`;");
	}
}

	
// list of fileds 
$result = mysql_query("SHOW COLUMNS FROM $tbn");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
      echo $row['Field']; echo "<br>";
    }
}



	}
	else {
		//create table and primary key
	

 	mysql_query("CREATE TABLE `$newtbname` (`tid` int(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
 	mysql_query("ALTER TABLE `$newtbname` ADD PRIMARY KEY (`tid`);");
 	mysql_query("ALTER TABLE `$newtbname` CHANGE `tid` `tid` INT(100) NOT NULL AUTO_INCREMENT;");
 	

 	header("location:?tbn=$newtbname");
  }
 



?>