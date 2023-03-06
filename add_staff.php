
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

.input{
	width:60%;
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
		
					<h3 class="text">Add Staff Details</h3><br><hr><br>
					
					<div class="content1">
					
						
						
					<?php
						if(isset($_POST["submit"]))
						{
							$hash = password_hash(1234, PASSWORD_DEFAULT);
							$sql = "SELECT MAIL FROM staff WHERE MAIL='{$_POST["mail"]}'";
							$result = mysqli_query($db,$sql) or die("Query unsuccessful") ;
    						  if (mysqli_num_rows($result) > 0) {
									echo "<div class='error'>Email already has an account..</div>";
      							} else {
									$sq="insert into staff(TNAME,TPASS,QUAL,SAL,MAIL) values('{$_POST["sname"]}','$hash','{$_POST["qual"]}','{$_POST["sal"]}','{$_POST["mail"]}')";
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
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>Staff Name</label><br>
					     <input type="text" name="sname" required class="input">
					     <br><br>
					     <label>Qualification</label><br>
					     <input type="text" name="qual" required class="input">
						 <br><br>						 
					     <label>  E - Mail</label><br>
						 <input type="email"  class="input"  name="mail">
					     <br><br>					
					     <label>Salary</label><br>
					     <input type="text" name="sal" required class="input">
					     <br><br>
					     <button type="submit" class="btn1" name="submit">Add Staff Details</button>
					</form>
				
				
				</div>
				

			</div>	
			
</div>
<?php include"footer.php";?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>




