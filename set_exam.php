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
				<h3 class="text">Set Exam Details</h3><br><hr><br>					
				<div class="content1 ">					
					<?php
						if(isset($_POST["submit"]))
							{
								$sq = "SELECT CID FROM class where Class = '{$_POST["class"]}' AND Medium='{$_POST["medium"]}'";
									$re=$db->query($sq);								
									$rows=$re->fetch_assoc();
								$sql = "SELECT ENAME FROM exam WHERE EDATE='{$_POST["edate"]}' AND startTime='{$_POST["estime"]}' AND CID='{$rows["CID"]}'";
								$result = mysqli_query($db,$sql) or die("Query unsuccessful") ;
									if (mysqli_num_rows($result) > 0) {
										echo "<div class='error'>Exam is already exist</div>";
									} else {
										$sq="insert into exam(ENAME,EDATE,startTime,endTime,Subject,CID) values ('{$_POST["ename"]}','{$_POST["edate"]}','{$_POST["estime"]}','{$_POST["eetime"]}','{$_POST["sub"]}','{$rows["CID"]}')";
										if($db->query($sq))
										{
											echo "<div class='success'>Insert Success</div>";
										}
										else
										{
											echo "<div class='error'>Insert Failed</div>";
										}
									}							
							}
					?>
					
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label> Exam Name</label><br>
								<input type="text" class="input" name="ename"><br><br>
						<label> Exam Date</label><br>
								<input type="date" id="edate" class="input" name="edate"><br><br>
						<label> Exam Start Time</label><br>
							<input type="time" id="estime" class="input" name="estime"><br><br>
						<label> Exam End Time</label><br>
							<input type="time" id="eetime" class="input" name="eetime"><br><br>
						<label>Subject</label><br>
							<select name="sub" required class="input">
								<?php
									$s="select DISTINCT(SNAME) from subject";
									$re=$db->query($s);
									if($re->num_rows>0)
									{
										echo "<option value=''>select</option>";
										while($r=$re->fetch_assoc())
										{
											echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
										}
									}
								?>
							</select>
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
						<label>Medium </label><br>
						<select name="medium"  required class="input">
							<option value="Tamil">Tamil</option>
							<option value="English">English</option>
						</select>
						<br></br>
						<button type="submit" class="btn1" name="submit">Add Exam Details</button>
					</form>
					</div>
				</div>	
			</div>				
		</div>
		<?php include"footer.php";?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	
	</body>
</html>


