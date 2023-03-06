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
		@media screen and (max-width: 700px) {
		
		#section{height:1400px !important;}
		.lbox1,.rbox1{width:100%;}
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
				<?php
					$update_id = $_SESSION["TID"];
					$select_users = mysqli_query($db, "SELECT * FROM staff WHERE TID = '$update_id' ") or die('query failed');
															
					if(mysqli_num_rows($select_users) > 0){
						while($fetch_users = mysqli_fetch_assoc($select_users)){
				?>				
					<h3 class="text">Edit Profile</h3><br><hr><br>							
					<div class="content1 ">							
						<div class="lbox1">		
								<?php
									if(isset($_POST["submit"]))
									
									{
										$target="staff/";
										$target_file=$target.basename($_FILES["img"]["name"]);
										
										if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
										{
											if($_POST["addr"]==''){
												$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$fetch_users['PADDR']}',IMG='{$target_file}'where TID={$_SESSION["TID"]}";
												$db->query($sql);
												echo "<div class='success'>Insert Success</div>";
											}else{
												$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$target_file}'where TID={$_SESSION["TID"]}";
												$db->query($sql);
												echo "<div class='success'>Insert Success</div>";
											}													
										}else{	
											if($_POST["addr"]==''){
												$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$fetch_users['PADDR']}',IMG='{$fetch_users['IMG']}'where TID={$_SESSION["TID"]}";
												$db->query($sql);
												echo "<div class='success'>Insert Success</div>";
											}else{
												$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$fetch_users['IMG']}'where TID={$_SESSION["TID"]}";
												$db->query($sql);
												echo "<div class='success'>Insert Success</div>";
											}									
											}								
									}
								
								
								?>
								<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
									
										<label>  Phone No</label><br>
										<input type="tel" name="pno" id="phoneno" tabindex="1" class="input" pattern="[0-9]{3}-[0-9]{7}" maxlength="11"  placeholder="Mobile Number XXX-XXXXXXX" value="<?php echo $fetch_users['PNO']; ?>">
										<br><br>
										<label>  E - Mail</label><br>
										<input type="email"  class="input" value="<?php echo $fetch_users['MAIL']; ?>" name="mail"><br><br>
										<label>  Address</label><br>
										<textarea rows="5" value="<?php echo $fetch_users['PADDR']; ?>" name="addr"></textarea><br><br>
										<label> Image</label><br>
										<input type="file"  class="input" value="<?php echo $fetch_users['IMG']; ?>"  name="img"><br><br>
									<button type="submit" class="btn1" name="submit">Edit Profile</button>
								</form>							
						</div>
						<?php
									}
								}else{
									echo 'no profile!! </p>';
								}
							?>
						<div class="rbox1">
							<h3> Profile</h3><br>
						
							<?php
							$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
							$res=$db->query($sql);

							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
							}
							?>
						
						<table  class='table table-striped mb-5'>
							<thead>
								<tr>	
									
								</tr>
							</thead>			
							<tbody>
									<tr>
										<td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td>
									</tr>							
							</tbody>						
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


