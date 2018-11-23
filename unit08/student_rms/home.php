<?php
require_once("class/class_student.php");


$student = new Student();
$student_list = $student->display_students_v2();

echo "<div class ='alert alert-dark'>";
echo '<div class="row">';
echo '<div class="col-sm-12">';
echo '<h1 align="center">Student Records</h1>' ; 
echo "</div>";
echo "</div>";
echo "</div>";
echo "<div align = 'center'>";

echo '<a href="student_registration_form.php">Add new student</a>';
echo "<table border = 1 >";
	echo "<tr>";
		echo "<th>No</th>";
		echo "<th>Last Name</th>";
		echo "<th>First Name</th>";
		echo "<th>Middle Name</th>";
		echo "<th>Email Address</th>";
		echo "<th>Mobile Number</th>";
		echo "<th>Degree Program</th>";
		echo "<th>School</th>";
		echo "<th>Update</th>";
	echo "</tr>";

	$total_count_number = 0;
	for ($ctr=0; $ctr < count($student_list) ; $ctr++) 
	{ 
		$student_ctr = $ctr + 1;
		echo "<tr>";
			//echo "<td>".$student_list[$ctr][0]."</td>";
			echo "<td>".$student_ctr."</td>";
			echo "<td>".$student_list[$ctr][1]."</td>";
			echo "<td>".$student_list[$ctr][2]."</td>";
			echo "<td>".$student_list[$ctr][3]."</td>";
			echo "<td>".$student_list[$ctr][4]."</td>";
			echo "<td>".$student_list[$ctr][5]."</td>";
			echo "<td>".$student_list[$ctr][7]."</td>"; 
			echo "<td>".$student_list[$ctr][8]."</td>"; 
			
			echo '<td align = "Center"><a href="update_form.php?id='.$student_list[$ctr][0].'
						&username='.$student_list[$ctr][1].'
						&lastname='.$student_list[$ctr][2].'
						&firstname='.$student_list[$ctr][3].'
						&middlename='.$student_list[$ctr][4].'
						&email='.$student_list[$ctr][5].'">Update</a></td>'; 
			

		echo "</tr>";
	}
	
echo "</table>";



?>