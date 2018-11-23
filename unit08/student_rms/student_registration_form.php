<h2>Student Registration Form</h2>
<a href="home.php">Home</a>
<br>
<br>
<table>

<form method="POST" action="insert_student.php">
	<tr>
		<!-- <td>Last Name</td> -->
		<td><input type="text" name="stud_lname" value="" placeholder="Last name" required></td>
	</tr>
	
	<tr>
		<!-- <td>First Name</td> -->
		<td><input type="text" name="stud_fname" value="" placeholder="First name" required></td>
	</tr>
	
	<tr>
		<!-- <td>Middle Name</td> -->
		<td><input type="text" name="stud_mname" value="" placeholder="Middle Name" required></td>
	</tr>

	<tr>
		<!-- <td>Email Address</td> -->
		<td><input type="email" name="stud_email" value="" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></td>
	</tr>

	<tr>
		<!-- <td>Mobile Number</td> -->
		<td><input type="text" name="stud_mob_no" value="" placeholder="Mobile Number" pattern="[0-9]+" required></td>
	</tr>

	<tr>
		<td>Birthday</td>
	</tr>
	
	<tr>
		<!-- <td>Birthday</td> -->
		<td><input type="date" name="stud_bday" value="" required></td>
	</tr>
	

	<tr>
		<td><input type="submit" name="submit" value="save"></td>
	</tr>
</form>

</table>