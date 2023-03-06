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

	.btn{
		border-radius:5px;
		padding:2px;
		background:#663b95;
		color:white;
		margin-top:30px;    
		
		height:40px;
		width:90%;
		
	}

	.btn:hover{
		border-radius:5px;
		padding:10px;
		background:#8959bd;
		color:white;
		margin-top:50px;
		-ms-transform: scale(1.1); /* IE 9 */
		-webkit-transform: scale(1.1); /* Safari 3-8 */
		transform: scale(1.1); 

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
		
					<h3 class="text">Add Student Details</h3><br><hr><br>
					
					<div class="content1">

					<?php
						if(isset($_POST["submit"]))
						{
						
							$target="student/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql = "SELECT CID FROM class where Class = '{$_POST["class"]}' AND Medium='{$_POST["medium"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								$rows=$re->fetch_assoc();

								$sq="insert into student(RNO,NAME,FNAME,DOB,GEN,PHO,MAIL,ADDR,CID,SIMG) values('{$_POST["rno"]}','{$_POST["name"]}','{$_POST["fname"]}','{$_POST["dob"]}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["addr"]}','{$rows["CID"]}','{$target_file}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}else
							{
								echo "<div class='error'>selected medium doesn't exist..</div>";
							}
						}
						else{
							$sql = "SELECT CID FROM class where Class = '{$_POST["class"]}' AND Medium='{$_POST["medium"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								$rows=$re->fetch_assoc();

								$sq="insert into student(RNO,NAME,FNAME,DOB,GEN,PHO,MAIL,ADDR,CID) values('{$_POST["rno"]}','{$_POST["name"]}','{$_POST["fname"]}','{$_POST["dob"]}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["addr"]}','{$rows["CID"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}else
							{
								echo "<div class='error'>selected medium doesn't exist..</div>";
							}
						}
					}
					
					?>
					<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox">
					<label> ID</label><br>
						<?php
							$no=1;
							$sql="select * from student order by RNO desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=$row1["RNO"]+1;
							
							}
						?>
					<input type="text" class="input3" name="rno" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label> Student Name</label><br>
					<input type="text" class="input3" name="name"><br><br>
					<label> Father Name</label><br>
					<input type="text" class="input3" name="fname"><br><br>	
					<label>  Date of Birth</label><br>	
					<input type="date" id="dob" class="input3" name="dob"><br><br>	
					<label>Gender</label><br>
					<select name="gen" required class="input3">
							<option value="">Select</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
					</select><br><br>
					
					<label> Phone No</label><br>				
					<input type="tel" name="pho" id="phoneno" tabindex="1" class="input3" pattern="[0-9]{10}" maxlength="10"  ><br><br>
						</div>



						<div class="rbox">
					<label> Email</label><br>
					<input type="email" class="input3" name="email"><br><br>
					
					<label>  Address</label><br>
					<textarea rows="5" class="input3" name="addr"></textarea><br><br>

					<label>Class</label><br>
							<select name="class" required class="input3">
						
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
						<select name="medium"  required class="input3">
							<option value="Tamil">Tamil</option>
							<option value="English">English</option>
						</select>
						<br></br>
					<label> Image</label><br>
					<input type="file"  class="input3"  name="img"><br><br>

					 <button type="submit" class="btn" name="submit">Add Student Details</button>
					</form>
								</div>
				
				</div>
				

			</div>	
			
		</div>
	<?php include"footer.php";?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>




