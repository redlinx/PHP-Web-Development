<?php

//User defined function with parameter set as array

function print_student_names($stud_names){
	return $stud_names;
}

$students = array("Adam","Barry","Clide","David","Eve","Francis"); //array with numeric indexing

$result = print_student_names($students); //variable setting to the result of the function call

echo "<pre>";
print_r($result);
echo "</pre>";


$students = array("first" => "Adam","second" => "Barry","third" => "Clide","fourth" => "David","fifth" => "Eve","sixth" => "Francis"); //array with associative indexing

$result = print_student_names($students); //variable setting to the result of the function call

echo "<pre>";
print_r($result);
echo "</pre>";

?>