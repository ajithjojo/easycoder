<?php
$host = $_POST['host'];
$username = $_POST['user'];
$password = $_POST['pass'];
$db_name = $_POST['db'];



	
if($db_name==NULL)
{
	
}
else {


$my_file = '../output/config.php';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = '
<?php
error_reporting(0);
$conn = mysqli_connect("'.$host.'", "'.$username.'", "'.$password.'", "'.$db_name.'");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 ';

 
fwrite($handle, $data);



}
header("location:../");
?>
