<?php
require_once("class/class_student.php");

$student = new Student();
$student->insert_student($_POST);

header('Location: home.php');

?>