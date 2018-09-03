<?php

abstract class Student{
	public $stud_name = "francis";
}


class MyStudent extends Student{


}




$student = new MyStudent;

echo $student->stud_name;



?>