<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["rno"]))
	{
		$sql="select * from student where RNO='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$batch=$rows["Batch"];
			$regno=$_GET["rno"];
		}
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

		.input{
			width:60%;
		}
	</style>
	</head>
	<body>	
	
		<?php include"navbar.php";?>
		
		<div class="sidebar  px-2 py-5">
			<?php include"sidebar.php";?><br>
		</div>
	
		<div class="container-fluid mt-5">
			
			<div id="section">
		
				<h3 class="text">Add Marks</h3><br><hr><br>
					
					<div class="content1">					
						
					<?php
						if(isset($_POST["submit"]))						
						{
							
							$sq="insert into mark(REGNO,SUB,MARK,ENAME) values ('{$_POST["regno"]}','{$_POST["sub"]}','{$_POST["mark"]}','{$_POST["ename"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}				
					
					?>
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
					<div class="lbox">
							<label> Register No</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input" name="regno" readonly><br><br>
																				
							<label> Exam Name</label><br>
							<select name="ename" required class="input">
						
								<?php 
									 $s="SELECT DISTINCT(ENAME) FROM exam";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["ENAME"]}'>{$r["ENAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
						</div>
						<div class="rbox">
							
						<label>Subject</label><br>
							<select name="sub" required class="input">
						
								<?php 
									 $s="SELECT DISTINCT(SNAME)  FROM subject";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input" name="mark"  id="mark" type="mark" required>
							<br><br>
							<button type="submit" style="float:right;" class="btn1" name="submit"> Add Mark Details</button>
							</div>
					</form>					
				</div>	
			</div>			
		</div>
		<?php include"footer.php";?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>




