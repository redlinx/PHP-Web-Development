<?php

Class MyDatabase{
	protected function connect_database(){
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'election';

		$mydb = new mysqli($host,$username,$password,$db);
		return $mydb;
	}
}

?>