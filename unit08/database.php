<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'election';
$sql = 'SELECT * FROM account';

$accounts = new mysqli($host,$username,$password,$db);

$accounts->real_query($sql);

$result = $accounts->use_result();

$ctr = 0;
while ($row = $result->fetch_row()) {
	$student_account[$ctr][0] = $row[0];
	$student_account[$ctr][1] = $row[1];
	$student_account[$ctr][2] = $row[2];
	$student_account[$ctr][3] = $row[3];
	$student_account[$ctr][4] = $row[4];
	$student_account[$ctr][5] = $row[5];
	$ctr++;
}

echo "<pre>";
print_r($student_account);
echo "</pre>";



?>