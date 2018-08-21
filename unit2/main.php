<?php
include_once "student_list.php";
include_once "part1.php";

for($x=0;$x<count($student["name"]);$x++){
	echo "<tr>";
		echo "<td>";
		echo $student["name"][$x];
		echo "</td>";

		echo "<td>";
		echo $student["contact"][$x];
		echo "</td>";

		echo "<td>";
		echo $student["address"][$x];
		echo "</td>";
	echo "</tr>";
}

include_once "part2.php";
?>