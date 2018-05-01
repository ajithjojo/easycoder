<?php include('header.php'); 
include('output/config.php');

?>

<div class="container">
	<div class="col-md-4">
		 		
				<div class="panel panel-warning">
				  <div class="panel-heading">List Of Tables</div>
				  <div class="panel-body">
				  	 <div class="list-group">
				<?php  	$result = $conn->query("SHOW TABLES");
			    //print_r($result);
			    while($tableName = mysqli_fetch_row($result))
			    {
			        $table = $tableName[0];
			      ?>
			      
					  <a href="?db=<?php echo $table; ?>" class="list-group-item"><?php echo $table; ?></a>
					
				
			      <?php 
			    } ?>
					 
				    	</div>	
				  </div>
				</div>
		 	</div>
		 	<?php
		 	$getdb = $_GET['db'];
		 	if($getdb==NULL)
		 	{
		 		?>
		 	<div class="col-md-8">
		 		<div class="panel panel-success">
				 <div class="panel-body" style="margin-top:100px; margin-bottom:100px;  ">
				 		<center>
				 			 	<img src="img/code.jpg" width="140" /><br>
									<h3>Select a table from list or Create new </h3>
									<a href="dbmaker.php"><button type="button" class="btn btn-success">Create New Table</button></a>
				 		</center>
				  </div>
				</div>
			</div>
		 		<?php
		 	} else
		 	{ 
		 	?>
		 	<div class="col-md-8">
		 		<div class="panel panel-success">
				  <div class="panel-heading">Insert Code</div>
				  <div class="panel-body">
					<?php


						// get filed list

						$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					?>
					    $<?php echo $dbf; ?> = $_POST['<?php echo $dbf; ?>']; <br>
					 <? }

					?>
					<br><br>

					// please remove last ' ,  (coma)' from fileds
					<br><br>

					mysqli_query($conn,"INSERT INTO `<?php echo $getdb; ?>` (
					 <?php	$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					      echo "`".$dbf."`,";
					} ?>

					) VALUES (<?php	$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					      echo "'$".$dbf."',";
					} ?>)"); 
					

				  </div>
				</div>
				<div class="panel panel-success">
				  <div class="panel-heading">Select Single</div>
				  <div class="panel-body">
					
					$getdata = mysqli_query($conn,"SELECT * FROM <? echo $getdb; ?> ");

					<br>
						$row = mysqli_fetch_array($getdata); <br>
						<?php
					$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					?>
					    $<?php echo $dbf; ?> = $row['<?php echo $dbf; ?>']; <br>
					 <? }
					?>

				  </div>
				</div>
				<div class="panel panel-success">
				  <div class="panel-heading">Select While</div>
				  <div class="panel-body">
					
					$getdata = mysqli_query($conn,"SELECT * FROM <? echo $getdb; ?> ");

					<br>
						while($row = mysqli_fetch_array($getdata)) { <br>
						<?php
					$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					?>
					    $<?php echo $dbf; ?> = $row['<?php echo $dbf; ?>']; <br>
					 <? } 
					?>
					}

				  </div>
				</div>
				<div class="panel panel-success">
				  <div class="panel-heading">Delete Code</div>
				  <div class="panel-body">
						
			$getid = $_GET['id']; <br>
		mysqli_query($conn,"DELETE FROM <?php echo $getdb; ?> WHERE tid ='$id' "); 

						  </div>
				</div>
				<div class="panel panel-success">
				  <div class="panel-heading">Update Single Code</div>
				  <div class="panel-body">
					<?php
						$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					?>
					    $<?php echo $dbf; ?> = $_POST['<?php echo $dbf; ?>']; <br>
					 <? }

					?>
					<br>
					<?
					$result = mysqli_query($conn,"SHOW COLUMNS FROM $getdb");
						while ($row = mysqli_fetch_assoc($result)) {
					      $dbf = $row['Field']; 
					?>

					mysqli_query($conn,"UPDATE `<?php echo $getdb; ?>` SET `<?php echo $dbf; ?>` = '$<?php echo $dbf; ?>' WHERE `<?php echo $getdb; ?>`.`tid` = 1") <br>

					<? } ?>
				  </div>
				</div>
			</div>
		 	<?php } ?>
 </div>

<?php include('footer.php'); ?>