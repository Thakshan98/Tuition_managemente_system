<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"])&& $_SESSION["TID"]!=1)
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
				<h3 class="text">View Student Details</h3><br><hr><br>						
					<div class="content1 ">							
						<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">						
							<label>Class</label><br>
							<select name="class" required class="input">
						
								<?php 
									$sl="SELECT DISTINCT(Class) FROM class";
									$r=$db->query($sl);
										if($r->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($ro=$r->fetch_assoc())
												{
													echo "<option value='{$ro["Class"]}'>{$ro["Class"]}</option>";
												}
											}
								?>					
							</select>
							<br><br>

							<label>Medium</label><br>
								<select name="medium" required class="input">
						
								<?php 
									$sql="SELECT DISTINCT(Medium) FROM class";
									$re=$db->query($sql);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["Medium"]}'>{$r["Medium"]}</option>";
												}
											}
								?>					
							</select><br><br>
						
							<button type="submit" class="btn1" name="view"> View Details</button>
							</form>
							<br>
						<?php
								if(isset($_POST["view"]))
								{
									echo "<h4>Student Details</h4><br>";
									$sql="select * from class where Class='{$_POST["class"]}' and Medium='{$_POST["medium"]}'";
									$re=$db->query($sql);
									if($re->num_rows>0)
									{
										$rows=$re->fetch_assoc();
										$sq = "SELECT * FROM student where CID = '{$rows["CID"]}'";
									$row=$db->query($sq);
									if($row->num_rows>0)
									{
									
										echo"<table  class='table table-striped mb-5'>
										<thead>
											<tr>
												<th>S.No</th>
												<th>Roll No</th>
												<th>Name</th>											
												<th>Class</th>
												<th>Medium</th>
												<th>View</th>
												<th>Delete</th>
											</tr>
										</thead>
														";
										$i=0;
										while($r=$row->fetch_assoc())
										{
											$i++;
												echo  	"<tbody>
																<tr>
																	<th >{$i}</th>
																	<td>{$r["RNO"]}</td>
																	<td>{$r["NAME"]}</td>											
																	<td>{$rows["Class"]}</td>
																	<td>{$rows["Medium"]}</td>											
																	<td><a href='view_stud.php?id={$r["RNO"]}' class='btnb'>View</a></td>
																	<td><a href='stud_delete_admin.php?id={$r["RNO"]}' class='btnr'>Delete</a></td>
																</tr>
														</tbody>
													";			
												}}else{
													echo "No record Found";
												}
											}
										else
										{
											echo "No record Found";
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


