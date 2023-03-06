<?php
	include "database.php";
	session_start();
?>
<!doctype html>
<html lang="en">
  	<head>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Science Corner</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>	
			body{
			background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184));
			height:577px;
		}
			
		
		.row{
			background:white;
			border-radius:30px;
			box-shadow:12px 12px 22px grey;
			background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184));
		}
		img{
			border-top-left-radius:30px;
			border-bottom-left-radius:30px;
		}
		h1,h4{
			font-weight: bold;
		}
		.btn{
			border:none;
			outline:none;
			height:50px;
			width: 100%;
			background-color:#563c6b;
			color:white;
			border-radius:8px;
			font-weight: bold;
			box-shadow:12px 12px 22px grey;
		}
		.btn:hover{
			background-color:white;
			border:2px solid;
			color:black;
		}
		.container{
			width:70%;
			
		}
		label{
			color: #4d1212;
		}
		
	</style>
 	 </head>
 	 <body>
 		<?php
			if(isset($_POST["login"]))
			{
				$sql="select * from staff where TNAME='{$_POST["name"]}'";
				$result=$db->query($sql);
				$fetch_pass = $result->fetch_assoc();
				$verify = password_verify($_POST["pass"], $fetch_pass['TPASS']);
			
				if($verify && $fetch_pass["TID"]!=1)
				{
					
					$_SESSION["TID"]=$fetch_pass["TID"];
					$_SESSION["TNAME"]=$fetch_pass["TNAME"];
					echo "<script>window.open('teacher_home.php','_self');</script>";
				}
				else
				{
					echo "<div class='error'>Invalid Username Or Password</div>";
				}
			}
		
		
		
		?>
	
		<section class="form my-5 mx-5">
			<div class="container d-flex justify-content-center ">		
				<div class="row g-0 ">
					<div class="col-lg-6">
						<img src="img/login.png" width="100%" height="100%" alt="">
					</div>
					<div class="col-lg-6 px-2 pt-3 text-center" >
					<h1 class="mb-5">Teacher</h1>	
					
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
							<div class="form-row d-flex justify-content-center">
								<div class="col-lg-6 ">
									<label>User Name</label>
								</div>	
							</div>
							<div class="form-row d-flex justify-content-center">
								<div class="col-lg-6">
									<input type="text" name="name" required class="form-control my-2 " placeholder="User Name">
								</div>	
							</div>
							<div class="form-row d-flex justify-content-center">
								<div class="col-lg-6">
								<label>Password</label>
								</div>
							</div>
							<div class="form-row d-flex justify-content-center">
								<div class="col-lg-6">
									<input type="password" name="pass" required class="form-control my-2" placeholder="*******">
								</div>
							</div>
							<div class="form-row d-flex justify-content-center">
								<div class="col-lg-6">
								<button type="submit" class="btn my-2" name="login">Login</button>
								</div>	
							</div>
							<div class="form-row d-flex justify-content-center">
								<div class="col-lg-6 my-3">
								<b>Are you a <a href="index.php">Admin</a></b>
								</div>	
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
  </body>
</html>