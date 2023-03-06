<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
		
				<h3 class="text">Change Password</h3><br><hr><br>
					
				<div class="content1 ">
					
					<?php							
						if(isset($_POST["submit"]))
						{							
							$sql="select * from staff where TID='{$_SESSION["TID"]}'";
							$result=$db->query($sql);
							$fetch_pass = $result->fetch_assoc();
							$verify = password_verify($_POST["opass"], $fetch_pass['TPASS']);
							
								if($verify)
								{
									if(!empty($_POST["password"]) && isset( $_POST['password'] )) {
										$password = $_POST["password"];
										$cpassword = $_POST["cpassword"];
										if (mb_strlen($_POST["password"]) <= 8) {
											echo"<div class='error'>Your Password Must Contain At Least 8 Characters!</div>";
											
										}
										elseif(!preg_match("#[0-9]+#",$password)) {
											echo"<div class='error'>Your Password Must Contain At Least 1 Number!</div>";
											
										}
										elseif(!preg_match("#[A-Z]+#",$password)) {
											echo"<div class='error'>Your Password Must Contain At Least 1 Capital Letter!</div>";
											
										}
										elseif(!preg_match("#[a-z]+#",$password)) {
											echo"<div class='error'>Your Password Must Contain At Least 1 Lowercase Letter!</div>";
											
										}
										elseif (strcmp($password, $cpassword) !== 0) {
											echo"<div class='error'>password Mismatch</div>";
										}
										else{
											$hash = password_hash($_POST["password"], 
											PASSWORD_DEFAULT);
											
											$sql="UPDATE staff SET  TPASS='{$hash}' where  TID='{$_SESSION["TID"]}'";
											$db->query($sql);
											echo"<div class='success'>password Changed</div>";
										}
									} else {
										echo"<div class='error'>Please fill all fields</div>";
									}
								}
								else
								{
									echo"<div class='error'>Invalid password</div>";
								}
						}
					?>
					
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Old Password</label><br>
						<input type="text" class="input" name="opass"><br><br>
						<label>New Password</label><br>
						<input type="text" class="input" name="password"><br>
						<p>(Your Password Must Contain At Least 8 Characters and which includes a Number,</br>
							1 Capital Letter and 1 Lowercase Letter)</p>
						
						
						<label>Confirm Password</label><br>
						<input type="text" class="input" name="cpassword"><br><br>
						<button type="submit" class="btn1" style="float:left" name="submit"> Change Password</button>
						
					</form>
					</div>
				</div>	
			</div>			
		</div>
		<?php include"footer.php";?>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>


