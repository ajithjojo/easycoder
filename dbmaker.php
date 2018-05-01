<?php include('header.php'); 
include('output/config.php');

?>

<div class="container">
	<div class="col-md-4">
		 		<div class="panel panel-success">
				  <div class="panel-heading">Create New Table</div>
				  <div class="panel-body">
				  	<form action="code/newtb.php" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Table Name</label>
						    <input type="text" class="form-control"  name="newtbname" placeholder="table name">
						  </div>
						  <center><button type="submit" class="btn btn-success">Create</button> </center>
						  </form>	
				    	
				  </div>
				</div>
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
			      
					  <a href="?tbl=<?php echo $table; ?>" class="list-group-item"><?php echo $table; ?></a>
					
				
			      <?php 
			    } ?>
					 
				    	</div>	
				  </div>
				</div>
		 	</div>
		 	<?php $gettb = $_GET['tbl']; $lst = $_GET['lst'];
		 	if($gettb==NULL)
		 	{
		 		?>

			<div class="col-md-8">
		 		<div class="panel panel-success">
				 <div class="panel-body" style="margin-top:100px; margin-bottom:100px;  ">
				 		<center>
				 			 	<img src="img/db.png" width="140" /><br>
									<h3>Select a table from list or Create new </h3>
									
				 		</center>
				  </div>
				</div>
			</div>
		 		<?php 
		 	}  else {

		 	?>
		 	<div class="col-md-8">
		 		<div class="panel panel-success">
				  <div class="panel-heading">Create Fields</div>
				  <div class="panel-body">
				  	<div class="panel panel-default">
					  <div class="panel-body">
					  	<a href="generatecode.php?db=<?php echo $gettb; ?>"><button type="button" class="btn btn-success" style="float: right;">Generate php code</button></a>
					   <form class="form-inline" action="code/newtbfld.php" method="post" >
							  <div class="form-group">
							    <label class="sr-only" for="exampleInputEmail3">Field Name</label>
							    <input type="text" class="form-control" name="fname" autofocus placeholder="Field Name">
							  </div>
							  <div class="form-group">
							    <label class="sr-only" for="exampleInputPassword3">type</label>
							    <select class="form-control" name="type">
									  <option>VARCHAR( 1000 )</option>
									
									</select>
							  </div>
							  <input type="hidden" name="tb" value="<?php echo $gettb; ?>">
							   <input type="hidden" name="lst" value="<?php echo $lst; ?>">
							  
							  <button type="submit" class="btn btn-default">Save</button>
							</form>
 					
					  </div>
					</div>
					<?php
					

					 $result2 = $conn->query("SHOW COLUMNS from ".$gettb.""); 
			        if(mysqli_num_rows($result2))
			        {
			            echo '<table class="table">';
			            echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>';
			            while($row2 = mysqli_fetch_row($result2))
			            {
			                echo '<tr>';
			                foreach ($row2 as $key=>$value)
			                {
			                    echo '<td>',$value, '</td>';
			                }
			                echo '</tr>';
			            }
			            echo '</table><br />';
			        } ?>
				  </div>
				</div>
			</div>
		 	<?php } ?>
 </div>

<?php include('footer.php'); ?>