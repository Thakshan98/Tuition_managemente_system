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


</style>
	</head>
	<body>

	
		
	
	<?php include"navbar.php";?><br>
		
			<div class="sidebar  px-2 py-5">
						<?php include"sidebar.php";?><br>
			</div>
	
			<div class="container-fluid mt-5">
			
			<div id="section">
		
					<h3 class="text">Add Marks</h3><br><hr><br>
					
					<div class="content1">
					
						
						
					<?php
						if(isset($_GET["err"]))
						{
							echo "<div class='error'>{$_GET["err"]}</div>";
						}
					?>

					<form  method="get" action="mark.php">
						<div class="lbox1">	
						
							<label>Enter Roll No</label><br>
							<input type="text" class="input" name="rno"><br><br>
						</select>
						
						</div>
				
						<button type="submit" class="btn1" name="view"> View Details</button>
					
					</form>
				
				
				</div>
				

			</div>	
			
</div>
<?php include"footer.php";?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>




