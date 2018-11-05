<?php

$sql = 'SELECT * FROM Student';

$mysqli = new mysqli('', '', '', '');

$mysqli->real_query($sql);

$result = $mysqli->use_result();

$ctr = 0;
while($row = $result->fetch_row()){
	$student[$ctr][0] = $row[0];
	$student[$ctr][1] = $row[1];
	$student[$ctr][2] = $row[2];
	$student[$ctr][3] = $row[3];
	$student[$ctr][4] = $row[4];
	$student[$ctr][5] = $row[5];
	$student[$ctr][6] = $row[6];
	$ctr++;
}

$mysqli->close();

print_r($student);

?>