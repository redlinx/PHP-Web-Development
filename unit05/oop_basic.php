<?php

class Student{

	public $stud_name;

	public function print_name(){
		return "My name is ".$this->stud_name;
	}
}

$student = new Student;

$student->stud_name = "francis";

$result = $student->print_name();

echo $result;


?>