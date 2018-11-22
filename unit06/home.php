<?php
require_once("class/class_voter.php");


$voter = new voter();
$voters_list = $voter->display_voters_list();

echo "<div class ='alert alert-dark'>";
echo '<div class="row">';
echo '<div class="col-sm-12">';
echo '<h1 align="center">Account Records</h1>' ; 
echo "</div>";
echo "</div>";
echo "</div>";
echo "<div align = 'center'>";
echo "<table border = 1 >";
	echo "<tr>";
		echo "<td> Account ID</td>";
		echo "<td>Account Username</td>";
		echo "<td>Lastname</td>";
		echo "<td>Firstname</td>";
		echo "<td>Middlename</td>";
		echo "<td>Email Address</td>";
		echo "<td>Year_Month</td>";
		echo "<td>Update</td>";
	echo "</tr>";

$total_count_number = 0;
	for ($ctr=0; $ctr < count($voters_list) ; $ctr++) 
	{ 
		echo "<tr>";
			echo "<td align = 'Center'>".$voters_list[$ctr][0]."</td>";
			echo "<td align = 'Center'>".$voters_list[$ctr][1]."</td>";
			echo "<td align = 'Center'>".$voters_list[$ctr][2]."</td>";
			echo "<td align = 'Center'>".$voters_list[$ctr][3]."</td>";
			echo "<td align = 'Center'>".$voters_list[$ctr][4]."</td>";
			echo "<td align = 'Center'>".$voters_list[$ctr][5]."</td>";
			echo "<td align = 'Center'>".$voters_list[$ctr][6]."</td>"; 
			echo '<td align = "Center"><a href="update_form.php?id='.$voters_list[$ctr][0].'
						&username='.$voters_list[$ctr][1].'
						&lastname='.$voters_list[$ctr][2].'
						&firstname='.$voters_list[$ctr][3].'
						&middlename='.$voters_list[$ctr][4].'
						&email='.$voters_list[$ctr][5].'">Update</a></td>'; 
		echo "</tr>";
		$total_count_number += $voters_list[$ctr][0];
	}
	echo "<tr>
	<td>".$total_count_number."</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>";
	
echo "</table>";



?>