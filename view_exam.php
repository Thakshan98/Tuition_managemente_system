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
	</style>
	</head>
	<body>
		<?php include"navbar.php";?><br>
			
				<div class="sidebar  px-2 py-5">
							<?php include"sidebar.php";?><br>
				</div>
		
				<div class="container-fluid mt-5">
				
				<div id="section">
			
					<h3 class="text">Exam Time Table Details</h3><br><hr><br>
						
					<div class="content1 ">
					
				

					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}					
						?>
					<table  class='table table-striped mb-5'>
						<thead>
							<tr>
							<th>S.No</th>
								<th>ExamName</th>
								<th>Class</th>
								<th>Medium</th>
								<th>Subject</th>
								<th>Date</th>
								<th>StartTime</th>
								<th>EndTime</th>
								<th>Delete</th>
							</tr>
						</thead>
							
						<?php
							$s="select * from exam";
							$res=$db->query($s);
								if($res->num_rows>0)
									{
										$i=0;
										while($r=$res->fetch_assoc())
										{
											$sq="SELECT * FROM class WHERE CID={$r["CID"]}";
											$re=$db->query($sq);
											$ro=$re->fetch_assoc();
											$i++;

											echo "<tbody>
													<tr>
														<td>{$i}</td>
														<td>{$r["ENAME"]}</td>
														<td>{$ro["Class"]}</td>
														<td>{$ro["Medium"]}</td>
														<td>{$r["Subject"]}</td>													
														<td>{$r["EDATE"]}</td>
														<td>{$r["startTime"]}</td>
														<td>{$r["endTime"]}</td>
														<td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Delete</a></td>
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
		</div>
	<?php include"footer.php";?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>


