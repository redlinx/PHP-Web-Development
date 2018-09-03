<?php

$json = file_get_contents('http://localhost/webdev/unit04/rest_api/json.php');
//$json = file_get_contents('https://api.github.com/application/json');


$result = json_decode($json, true);

echo "<pre>";
print_r($result);
echo "</pre>";

?>