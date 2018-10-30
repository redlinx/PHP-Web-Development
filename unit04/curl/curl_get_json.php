<?php


$url = 'https://sourceforge.net/projects/openofficeorg.mirror/files/stats/json?start_date=2014-10-29&end_date=2014-11-04';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
$json = curl_exec($ch); 
curl_close($ch);


$result = json_decode($json, true);


echo "<table border=1>";
echo "<tr><th>Country</th><th>Users</th><th>Utilization Percentage</th><tr>";


$total_users = 0;

for($x=0;$x<count($result['countries']);$x++){
	$total_users = $total_users + $result['countries'][$x][1];
}

$total_user_percentage = 0;

for($x=0;$x<count($result['countries']);$x++){
	$user_percentage = ($result['countries'][$x][1]/$total_users)*100;
	$total_user_percentage = $total_user_percentage + $user_percentage;
	echo "<tr>";
	echo "<td>".$result['countries'][$x][0]."</td>";
	echo "<td>".$result['countries'][$x][1]."</td>";
	echo "<td><center>".round($user_percentage,4)."% </center></td>";
	echo "</tr>";
}
echo "<tr>";
echo "<td>";
echo "</td>";
echo "<td>";
echo $total_users;
echo "</td>";
echo "<td><center>";
echo $total_user_percentage;
echo "%</center></td>";
echo "<tr>";
echo "</table>";


// echo "<pre>";
// print_r($result);
// echo "</pre>";


?>