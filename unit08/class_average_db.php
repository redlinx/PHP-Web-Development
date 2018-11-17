<?php


class Database{
	function connect_db(){
		$host = "localhost";
		$username = "root";
		$password = "";
		$db = "university";
		$sql = 'SELECT * FROM  test_result LIMIT 0 , 30';

		$mydb = new mysqli($host,$username,$password,$db);
		$mydb->real_query($sql);

		$result = $mydb->use_result();

		$ctr = 0;
		while ($row = $result->fetch_row()) {
			$student_result[$ctr][0] = $row[0];
			$student_result[$ctr][1] = $row[1];
			$ctr++;
		}

		return $student_result;
	}

	function get_data(){

	}

	function close_db_connection(){

	}

}

class Teacher extends Database{
	function count_passers(){
		$result_generated = $this->connect_db();

		return $result_generated;
	}

	function count_failures(){

	}

	function get_highest_grade(){

	}

	function get_lowest_grade(){

	}

	function compute_class_average(){

	}

}

$teacher_padao = new Teacher();

$student_grade = $teacher_padao->count_passers(); 


echo "<pre>";
print_r($student_grade);
echo "</pre>";
?>