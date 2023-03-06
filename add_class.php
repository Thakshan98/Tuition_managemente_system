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
		height:1300px;
		}

		#frm{
			width:250px;
			
		}
		.con{
			height:1200px;
		}
		@media screen and (max-width: 700px) {
			body {
		
		background-image: linear-gradient( rgba(255,255,255), rgba(179, 173, 184));
		height:2400px;
		}
		.con{
			height:1500px;
		}
		}
  

	</style>
	</head>
	<body>		
		
		<?php include"navbar.php";?><br>
			
			<div class="sidebar  px-2 py-5">
				<?php include"sidebar.php";?><br>
			</div>
		
			<div class="con container-fluid mt-5">
				
				<div id="section">		
					<h3 class="text">Add Class Details</h3><br><hr><br>					
					<div class="content1 ">						
						<?php
							if(isset($_POST["submit"]))
						
							{
								if($_POST["class"]==''){
									echo "<div class='error'>Please enter class..</div>";
								}
								else
								{
									$sql="select * from class where Class='{$_POST["class"]}' and Medium='{$_POST["medium"]}'";
									$result=$db->query($sql);
									if($result->num_rows>0){
										echo "<div class='error'>Class is already exist..</div>";
									}
									else{	
									$sq="insert into class(Class,Medium) values('{$_POST["class"]}','{$_POST["medium"]}')";
										if($db->query($sq))
										{
											echo "<div class='success'>Insert Success..</div>";
										}
										else
										{
											echo "<div class='error'>Insert failed..</div>";
										}
									}
								}	
									
							}
						
						?>
							
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="mb-5">
							<label>Class</label><br>
							<input type="text" class="input2" name="class"><br><br>									
							<label>Medium </label><br>
							<select name="medium"  required class="input2">
								<option value="Tamil">Tamil</option>
								<option value="English">English</option>
							</select>
							<br>
							<button type="submit" class="btn1" name="submit">Add Class Details</button>
						</form>
					
						<br><hr>
					
						<h4 style="margin-top:50px;"> Batch Details</h4><br>

						<?php
							if(isset($_GET["mes"]))
							{
								echo"<div class='error'>{$_GET["mes"]}</div>";	
							}					
						?>
						<table  class='table table-striped mb-5'>
							<thead>
								<tr>
								<th >C.No</th>
								<th >Class</th>													
								<th >Medium</th>					
								<th >Delete</th>
								</tr>
							</thead>
								
							<?php 
								$s="select * from class";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($r=$res->fetch_assoc())
									{
										$i++;
										echo "<tbody>
										<tr>
										<th >{$i}</th>
										<td>{$r["Class"]}</td>										
										<td>{$r["Medium"]}</td>
										<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
										</tr>
										</tbody>
										";
									}		
								}
							?>
						</table>
					</div>
				</div>	
			</div>	
				
		
		<?php include"footer.php";?>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>


