
<h4 class="text">Dashboard</h4><hr>

<?php
	if(isset($_SESSION["TID"])&& $_SESSION["TID"]==1)
	{
		echo'
			<a href="home.php">Home</a>
			<a href="add_class.php"> Class</a>
			<a href="add_staff.php">Add Staff</a>
			<a href="add_sub.php"> Subject</a>		
			<a href="view_staff.php">View Staff</a>
			<a href="add_stud.php">Add Students</a>
			<a href="view_exam.php">View Exam</a>
			<a href="student.php"> View Student</a>		
		';

	}
	else{
		echo'
			<a href="teacher_home.php">Profile</a>
			
			<a href="student.php"> View Student</a>
			<a href="set_exam.php">Set Exam</a>
			<a href="view_exam.php">View Exam</a>
			<a href="add_mark.php">Add Marks</a>
			<a href="view_mark.php">View Marks</a>
		
		
		';
	}
?>
	



