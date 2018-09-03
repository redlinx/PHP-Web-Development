<?php
//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);


$arr =  array
  (
  "test1" => array(array("Volvo",22,18),array("BMW",15,13)),
  "test2" => array(array("Volvo",22,18),array("BMW",15,13))
  );



echo json_encode($arr);
?>