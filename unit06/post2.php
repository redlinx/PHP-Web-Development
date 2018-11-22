<h1>Post 2</h1>


<?php


if(isset($_POST["username"]) AND isset($_POST["password"]))
{
	echo $_POST["username"];
	echo "<br>";
	echo isset($_POST["password"]);
}

else
{
	echo "Please set the values for username and password";
}

?>