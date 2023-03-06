<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Science Corner</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
body {
 
  background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184));
}

#frm{
	width:250px;
	
}

</style>
	</head>
	<body>

	
		
	
	<?php include"navbar.php";?><br>
		
			<div class="sidebar  px-2 py-5">
						<?php include"sidebar.php";?><br>
			</div>
	
			<div class="container-fluid mt-5">
			
			<div id="section">
		
			<h3 class="text">Mark Details</h3><br><hr><br>
					
					<div class="content1 ">
					
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Roll No</label><br>
						<input type="text" class="input" name="rno"><br><br>
					</div>
				
					<button type="submit" class="btn1" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h4>Mark Details</h4><br>";
								$sql="select * from mark where REGNO='{$_POST["rno"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo"
									<table  class='table table-striped mb-5'>
									<thead>
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											<th>Class</th>
											<th>Medium</th>
											<th>Exam Name</th>
											<th>Subject</th>
											<th>Mark</th>
											<th >Delete</th>
										</tr>
									</thead>
									";
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$sq="select * from student where RNO='{$_POST["rno"]}'";
										$re=$db->query($sq);							
										$rows=$re->fetch_assoc();
										$s = "SELECT * FROM class where CID = '{$rows["CID"]}'";
										$re=$db->query($s);							
										$row=$re->fetch_assoc();
										$i++;
										echo "
										<tbody>
											<tr>
												<td>{$i}</td>
												<td>{$r["REGNO"]}</td>
												<td>{$row["Class"]}</td>
												<td>{$row["Medium"]}</td>
												<td>{$r["ENAME"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["MARK"]}</td>
												<td><a href='mark_del.php?id={$r["MID"]}' class='btnr'>Delete</a></td>
											</tr>
											</tbody>
										
										
										
										";
									}
								}
								else
								{
									echo "No Record Found";
								}
								echo "</table>";
							}
						
						
						?>
				
						
					</div>	
			</div>	
			
</div>
<?php include"footer.php";?>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>


