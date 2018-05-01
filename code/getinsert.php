<?
	include('../output/config.php');

	$getdb = $_GET['db'];

	

		// get filed list

	$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
?>
    $<? echo $dbf; ?> = $_POST['<? echo $dbf; ?>']; <br>
 <? }

?>
<br><br>

// please remove last ' ,  (coma)' from fileds
<br><br>

mysql_query("INSERT INTO `<? echo $getdb; ?>` (
 <?	$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
      echo "`".$dbf."`,";
} ?>

) VALUES (<?	$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
      echo "'$".$dbf."',";
} ?>)");


<br><br>
//SELECT 
<br><br>

$getdata = mysql_query("SELECT * FROM <? echo $getdb; ?> ");

<br>
	$row = mysql_fetch_array($getdata); <br>
	<?
$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
?>
    $<? echo $dbf; ?> = $row['<? echo $dbf; ?>']; <br>
 <? }
?>

<br><br>
//SELECT WHILE LOOP
<br><br>

$getdata = mysql_query("SELECT * FROM <? echo $getdb; ?> ");

<br>
	while($row = mysql_fetch_array($getdata)) { <br>
	<?
$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
?>
    $<? echo $dbf; ?> = $row['<? echo $dbf; ?>']; <br>
 <? } 
?>
}

<br><br>
DELETE
<br><br>

	$getid = $_GET['id']; <br>
mysql_query("DELETE FROM <? echo $getdb; ?> WHERE tid ='$id' "); 


<br><br>
UPDATE
<br><br>
<?
	$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
?>
    $<? echo $dbf; ?> = $_POST['<? echo $dbf; ?>']; <br>
 <? }

?>
<br>
<?
$result = mysql_query("SHOW COLUMNS FROM $getdb");
	while ($row = mysql_fetch_assoc($result)) {
      $dbf = $row['Field']; 
?>

mysql_query("UPDATE `<? echo $getdb; ?>` SET `<? echo $dbf; ?>` = '$<? echo $dbf; ?>' WHERE `<? echo $getdb; ?>`.`tid` = 1") <br>

<? } ?>
