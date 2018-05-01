<?php include('header.php'); ?>
<div class="container">
	<div class="col-md-4">
		 		<div class="panel panel-success">
				  <div class="panel-heading">Create Database Connection</div>
				  <div class="panel-body">
				  
				    	<form action="code/configmake.php" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Database Host</label>
						    <input type="text" class="form-control" name="host" placeholder="Localhost">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Database User</label>
						    <input type="text" class="form-control" name="user" placeholder="Username">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">User Password</label>
						    <input type="text" class="form-control" name="pass" placeholder="Password">
						  </div>
						   <div class="form-group">
						    <label for="exampleInputEmail1">Database Name</label>
						    <input type="text" class="form-control" name="db" placeholder="DB name">
						  </div>
						  <center><button type="submit" class="btn btn-success">Connect</button> </center>
						  </form>	
				  </div>
				</div>
		 	</div>
		 	<div class="col-md-4">
		 			<?php	include('output/config.php');
		 			if (mysqli_connect_errno())  {  }
		 				else
		 				{ ?>
		 					<div class="panel panel-default">
							  <div class="panel-body">
							    <center> 	<img src="img/db.png" width="80" /> 

							    	<h3> <b style="color: #76d34e;">DATABASE CONNECTED</b> </h3>
							    	<div class="well well-sm">output folder : output/config.php</div>

							    </center>

							  </div>
							</div>
		 				<?php	}
		 				
				  		?>
				  		<div class="col-md-6"><a href="dbmaker.php">
				  			<div class="panel panel-default">
							  <div class="panel-body">
				  			 <center> 	<img src="img/tb.png" width="40" /><br>
				  			 	<b>Create Table </b>
				  			 </center>
				  			 </div>
							</div> </a>
				  		</div>
				  		<div class="col-md-6"><a href="generatecode.php">
				  			<div class="panel panel-default">
							  <div class="panel-body">
				  			 <center> 	<img src="img/code.jpg" width="40" /><br>
									<b>Generate Code </b>
				  			 </center>
				  			 </div>
							</div></a>
				  		</div>

		 	</div>
		 	<div class="col-md-4">
		 				<div class="panel panel-default">
							  <div class="panel-body">
							  	DATABASE : <b>MySQLi </b> <br>
							  	PHP Version : <b> 5.3 + </b> <br>
							  	USAGE : <b>Fast Coding </b> <br>
							  	UI : <b>Bootstrap </b> <br>
							  	Author : <b><a href="http://openlax.com"> Ajith Joseph </a> </b> <br>
							  </div>
							</div> 
							<div class="panel panel-warning">
								<div class="panel-heading">How to use </div>
							  <div class="panel-body">							  
							  	<li><b>First, you have to connect your working database </b> </li><br>
							  	<li><b>By clicking Create Table, you can create tables faster than PhpMyAdmin  </b> </li><br>
							  	<li><b>Using Generate Code for generating insert, update, delete, select database related PHP codes automatically, so don't need to write these codes </b> </li><br>
							  </div>
							</div>  
		 	</div>
 </div>

<?php include('footer.php'); ?>