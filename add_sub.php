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
		height:1300px;
		}

		#frm{
			width:250px;
			
		}
		.con{
			height:1200px;
		}
		@media screen and (max-width: 700px) {
			body {
		
		background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184));
		height:2400px;
		}
		.con{
			height:1500px;
		}
		}
		</style>
	</head>
	<body>	
	
		<?php include"navbar.php";?><br>
		
		<div class="sidebar  px-2 py-5">
			<?php include"sidebar.php";?><br>
		</div>
	
		<div class="con container-fluid mt-5">			
			<div id="section">		
				<h3 class="text">Add Subject Details</h3><br><hr><br>					
				<div class="content1 ">						
						<?php
							if(isset($_POST["submit"]))
							{
								$sql1 = "SELECT TID FROM staff where TNAME = '{$_POST["staff"]}'";
								$re1=$db->query($sql1);
								$rows1=$re1->fetch_assoc();
								$sql = "SELECT CID FROM class where Class = '{$_POST["class"]}' AND Medium='{$_POST["medium"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								$rows=$re->fetch_assoc();
								$sqlcheck="select * from subject where SNAME='{$_POST["sname"]}' and CID='{$rows["CID"]}' and TID= '{$rows1["TID"]}'";
								$result=$db->query($sqlcheck);
									if($result->num_rows>0)
									{
										echo "<div class='error'>Teacher already assigned to this subject for this class..</div>";
									}
									else
									{	
										$sql="update staff set SUBJECT='{$_POST["sname"]}' where TID={$rows1["TID"]}";
										$db->query($sql);
										$sq="insert into subject(SNAME,CID,TID) values ('{$_POST["sname"]}','{$rows["CID"]}','{$rows1["TID"]}')";

										if($db->query($sq))
										{
											echo "<div class='success'>Insert Success..</div>";
										}
										else
										{
											echo "<div class='error'>Insert Failed..</div>";
										}
									}
								}
								else
								{
									echo "<div class='error'>selected medium doesn't exist..</div>";
								}

							}
							
						?>
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						   <label>Subject Name</label><br>
						   <input type="text" name="sname" required class="input">
						   <br><br>
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
							<label>Teacher</label><br>
							<select name="staff" required class="input">
						
								<?php 
									$sl="SELECT DISTINCT(TNAME) FROM staff WHERE isAdmin!=1";
									$r=$db->query($sl);
										if($r->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($ro=$r->fetch_assoc())
												{
													echo "<option value='{$ro["TNAME"]}'>{$ro["TNAME"]}</option>";
												}
											}
								?>
							
							</select>
							<br><br>
							<label>Medium </label><br>
							<select name="medium"  required class="input">
								<option value="Tamil">Tamil</option>
								<option value="English">English</option>
							</select>
							<br>
							<button type="submit" class="btn1" name="submit">Add Subject Details</button>
						</form>				
						<br><hr><br>				
						<h4 style="margin-top:50px;"> Subject Details</h4><br>
						<?php
								if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
							
							?>
						<table  class='table table-striped mb-5'>
							<thead>
								<tr>
								<th >S.No</th>
								<th >Subject Name</th>						
								<th >Class</th>						
								<th >Medium</th>						
								<th >Delete</th>
								</tr>
							</thead>
								
							<?php
									$s="select * from subject";
									$res=$db->query($s);
									if($res->num_rows>0)
									{
										$i=0;
										while($r=$res->fetch_assoc())
										{
											$s1="select * from class where CID='{$r["CID"]}'";
											$res1=$db->query($s1);
											$r1=$res1->fetch_assoc();
											$i++;
										echo  "<tbody>
										<tr>
										<th >{$i}</th>
										<td>{$r["SNAME"]}</td>
										<td>{$r1["Class"]}</td>
										<td>{$r1["Medium"]}</td>
										<td><a href='sub_delete.php?id={$r["subID"]}' class='btnr'>Delete</a></td>
										</tr>
										</tbody>
										";
											
										}
										
									}
									else
									{
										echo "No Record Found";
									}
								?>
								
							</table>					
				</div>	
			</div>				
		</div>
		<?php include"footer.php";?>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>


