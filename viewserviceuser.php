
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
		
		<div class="container-fluid mt-5">			
			<div id="section">		
			<h3 class="text">View Staff Details</h3><br><hr><br>					
				<div class="content1 ">						
					<form id="frm" autocomplete="off">
						<input type="text" id="txt" placeholder='Subject' class="input">
					</form>
					<br>
					<div id="box"></div>						
						<?php include"database.php";							
							$sql="SELECT * FROM staff WHERE isAdmin!=1 ";
							$res=$db->query($sql);
								echo "<table  class='table table-striped mb-5'>
									<thead>
										<tr>
										<th >S.No</th>
										<th >Name</th>
										<th >Subject</th>				
										<th >View</th>
										<th >Delete</th>
										</tr>
										</thead>
										";
							if($res->num_rows>0)
								
							{
								$i=0;
								while($row=$res->fetch_assoc())
								{
									$i++;
									echo "<tbody>
									<tr>
									<th >{$i}</th>
									<td>{$row["TNAME"]}</td>
									<td>{$row["SUBJECT"]}</td>			
									<td><a href='staff_view.php?id={$row["TID"]}' class='btnb'>View</a></td>
									<td><a href='staff_delete.php?id={$row["TID"]}' class='btnr'>Delete</a></td>
									</tr>
								</tbody>
									";
								}
										echo "</table>";
							}
								
							else
							{
								echo "<p>No Record Found</p>";
							}							
						?>						
				</div>	
			</div>		
		</div>
		<?php include"footer.php";?>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>	
	</body>
</html>


