<?php

Class MyDatabase extends mysqli
{
	protected function connect_database()
	{
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'db_student_rms';

		return $this->mysqli($host,$username,$password,$db);
	}
}

?>