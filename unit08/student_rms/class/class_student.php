<?php
require_once("class_mydb.php");

class Student extends MyDatabase
{
	public function display_students_v2()
	{
		$sql = 'CALL display_students()';

		$this->connect_database();
		$this->real_query($sql);
		$result = $this->use_result();

		$num_of_cols = $this->field_count;

		$ctr = 0;
		while ($row = $result->fetch_row()) 
		{	
			for($x=0; $x<$num_of_cols; $x++)
			{
				$student_list[$ctr][$x] = $row[$x];
			}

			$ctr++;
		}

		return $student_list;
	}

	public function display_students_v1()
	{
		$sql = 'SELECT s.stud_id,
					   s.stud_lname,
					   s.stud_fname,
					   s.stud_mname,
					   s.stud_email,
					   s.stud_mob_no,
					   p.prog_desc,
					   c.col_name, 
					   u.univ_name,
					   u.univ_address
				FROM student s,program p, college c, university u, academic_degree_level adl
				WHERE s.prog_id = p.prog_id AND 
		  			  p.col_id = c.col_id AND
		  			  c.univ_id = u.univ_id AND 
		  			  p.acad_dl_id = adl.acad_dl_id 
				ORDER BY p.acad_dl_id DESC, s.stud_lname ASC;';

		$this->connect_database();
		$this->real_query($sql);
		$result = $this->use_result();

		$ctr = 0;
		while ($row = $result->fetch_row()) 
		{
			$student_list[$ctr][0] = $row[0];
			$student_list[$ctr][1] = $row[1];
			$student_list[$ctr][2] = $row[2];
			$student_list[$ctr][3] = $row[3];
			$student_list[$ctr][4] = $row[4];
			$student_list[$ctr][5] = $row[5];
			$student_list[$ctr][6] = $row[6];
			$ctr++;
		}

		return $student_list;
	}

	public function insert_student($student)
	{
		$sql = "CALL insert_student('".$student['stud_lname']."',
									'".$student['stud_fname']."',
									'".$student['stud_mname']."',
									'".$student['stud_email']."',
									'".$student['stud_mob_no']."',
									'".$student['stud_bday']."',
									1)";

		$this->connect_database();
		$this->real_query($sql);

		$result = $this->use_result();

		return $result;
	}
}


// $student = new Student();

// echo "<pre>";
// print_r($student->display_students_v1());
// echo "</pre>";

// echo "<pre>";
// print_r($student->display_students_v2());
// echo "</pre>";

?>