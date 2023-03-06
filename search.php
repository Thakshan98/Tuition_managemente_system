<?php 
	include"database.php";
	
	$sql="SELECT * FROM staff WHERE SUBJECT LIKE '{$_POST["s"]}%' ";
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