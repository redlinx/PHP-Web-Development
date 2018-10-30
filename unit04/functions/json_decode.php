<?php


//$json = '{"a":1,"b":2}';
//$json = '[["Volvo",22,18],["BMW",15,13]]';
//$json = '{"test1":[["Volvo",22,18],["BMW",15,13]],"test2":[["Volvo",22,18],["BMW",15,13]]}';


//var_dump(json_decode($json));

$json = file_get_contents('https://sourceforge.net/projects/openofficeorg.mirror/files/stats/json?start_date=2014-10-29&end_date=2014-11-04');

$result = json_decode($json, true);

/*
echo "<table border=1>";
echo "<tr><th>Operating System</th><th>Users</th><tr>";

for($x=0;$x<count($result['oses']);$x++){
	echo "<tr>";
	echo "<td>".$result['oses'][$x][0]."</td>";
	echo "<td>".$result['oses'][$x][1]."</td>";
	echo "</tr>";
}
echo "</table>";
*/

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

echo "<pre>";
print_r($result);
echo "</pre>";
?>