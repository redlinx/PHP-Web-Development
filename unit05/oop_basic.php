<?php
//We will demonstrate the basic implementation of Object Oriented Programming in PHP.

//First, we need to create a class that will represent the object. That object must be given a name. For example, Student is the name of the object.

//Observe that on the right hand side, we place the term Class and on the left hand side we place curly braces.

//The class term defines that the student is an object and the curly braces is where all the functions are assigned.

//For example, we have a function that display student name.

Class Student{
	function display_student_name(){
		echo "My name is Mark";
	}
}

//To access the function, you need a variable that will represent the Student class.

$student = new Student();

//you can now point the function within the Student class.

$student->display_student_name();

?>