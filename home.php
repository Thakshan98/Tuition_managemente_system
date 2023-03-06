<?php
	include"database.php";
	session_start();
	function countRecord($sql,$db)
	{
	  $result = $db->query($sql);
	  return $result->num_rows;
	}
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
		
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
					<h3 > Science Corner</h3><br><br>
					<img src="img/banner.jpeg" class="imgs"><br><br><br><br>
					<br><br>
					<div class="row text-center d-flex justify-content-around">
						<div style=" border:2px solid #7a39e0; background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184)); box-Shadow: 0px 0px 16px 6px rgba(0, 0, 0, 0.33); overflow:hidden;" class="card col-md-3 col-sm-5 mx-1 my-2 bg-light rounded">
							<div class="d-flex text-center justify-content-between">
								<div class="p-3">
									<h4>Staff</h4>
									<h5><?php echo countRecord("SELECT * FROM staff",$db); ?></h5>
								</div>
							</div>
						</div>
						<div style=" border:2px solid #7a39e0; background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184)); box-Shadow: 0px 0px 16px 6px rgba(0, 0, 0, 0.33); overflow:hidden;" class="card col-md-3 col-sm-5 mx-1 my-2 bg-light rounded">
							<div class="d-flex text-center justify-content-between">
								<div class="p-3">
									<h4>Students</h4>
									<h5><?php echo countRecord("SELECT * FROM student",$db); ?></h5>
								</div>
							</div>
						</div>
						<div style=" border:2px solid #7a39e0; background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184)); box-Shadow: 0px 0px 16px 6px rgba(0, 0, 0, 0.33); overflow:hidden;" class="card col-md-3 col-sm-5 mx-1 my-2 bg-light rounded">
							<div class="d-flex text-center justify-content-between">
								<div class="p-3">
									<h4>Classes</h4>
									<h5><?php echo countRecord("SELECT * FROM class",$db); ?></h5>
								</div>
							</div>
						</div>
					</div>
			</div>			
		</div>
	<?php include"footer.php";?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>




