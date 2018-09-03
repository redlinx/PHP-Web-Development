<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';


$json_obj = json_decode($json);

echo "<pre>";
print_r($json_obj); //outout is in object form
echo "</pre>";

echo $json_obj->c;

echo "<pre>";
print_r(json_decode($json, true)); //output is in array form
echo "</pre>";
?>