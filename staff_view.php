<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"])&& $_SESSION["TID"]!=1)
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}	
	$sql="SELECT * FROM staff WHERE TID={$_GET["id"]}";
	$res=$db->query($sql);

	if($res->num_rows>0)
	{
		$row=$res->fetch_assoc();
		$sql1="SELECT * FROM subject WHERE TID={$row["TID"]}";
		$res1=$db->query($sql1);	
			
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
		.content1{margin-left: 0 !important;}
		</style>
	</head>

	<body>

		<?php include"navbar.php";?><br>
			
		<div class="sidebar  px-2 py-5">
			<?php include"sidebar.php";?><br>
		</div>
		
		<div class="container-fluid mt-5">
				
			<div id="section">
			
				<h3 class="text"> View Staff Details</h3><br><hr><br>
						
				<div class="content1 ">
						
						<div class="ibox">
							<img src="<?php echo $row["IMG"]; ?>" height="230" width="230" alt="upload Pending">
						</div>	
						
					<div class="tsbox">
						<table  class='table table-striped mb-5'  border="1px">				
						<thead>
							<tr>	
								<th>Name </th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td><?php echo $row["TNAME"] ?> </td>
							</tr>							
						</tbody>	
						<thead>
							<tr>	
								<th>Qualification </th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td><?php echo $row["QUAL"] ?>  </td>
							</tr>							
						</tbody>	
						<thead>
							<tr>	
								<th>Subject </th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td><?php echo $row["SUBJECT"] ?>  </td>
							</tr>							
						</tbody>	
						<thead>
							<tr>	
								<th>Classes</th>
							</tr>
						</thead>						
						<tbody>
							<tr>
							<?php
								if($res1->num_rows>0)
								{
									
									while($row1=$res1->fetch_assoc())
								{
									$sql2="SELECT * FROM class WHERE CID={$row1["CID"]}";
									$res2=$db->query($sql2);	
									$row2=$res2->fetch_assoc();
									?>
									<td><?php echo $row2["Class"] ?> (<?php echo $row2["Medium"] ?> medium)</td>
							</tr>	
						<?php ;}
								}?>
														
						</tbody>	
						
						<thead>
							<tr>	
								<th>Salary </th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td><?php echo $row["SAL"] ?>  </td>
							</tr>							
						</tbody>	
						<thead>
							<tr>	
								<th>Phone No </th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td><?php echo $row["PNO"] ?>  </td>
							</tr>							
						</tbody>	
						<thead>
							<tr>	
								<th>E - Mail </th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td><?php echo $row["MAIL"] ?>  </td>
							</tr>							
						</tbody>	
						<thead>
							<tr>	
								<th>Address</th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td> <?php echo $row["PADDR"] ?>  </td>
							</tr>							
						</tbody>	

					</table>
					
					</div>		
				</div>	
			</div>	
				
		</div>
		<?php include"footer.php";?>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
	</body>
</html>


