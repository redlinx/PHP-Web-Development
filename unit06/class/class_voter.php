<?php
require_once("class_mydb.php");

Class Voter extends MyDatabase{

	public function display_voters_list(){
		$sql = 'SELECT acct_id, acct_username, acct_lname, acct_fname, acct_mname, email_address, CONCAT(YEAR(time_date_log)," ", MONTHNAME(time_date_log)) FROM account';
		
		$voter_db = $this->connect_database();
		$voter_db->real_query($sql);
		$result = $voter_db->use_result();

		$ctr = 0;
		while ($row = $result->fetch_row()) {
			$voters_list[$ctr][0] = $row[0];
			$voters_list[$ctr][1] = $row[1];
			$voters_list[$ctr][2] = $row[2];
			$voters_list[$ctr][3] = $row[3];
			$voters_list[$ctr][4] = $row[4];
			$voters_list[$ctr][5] = $row[5];
			$voters_list[$ctr][6] = $row[6];
			$ctr++;
		}
		return $voters_list;
	}

	public function create_new_account(){}

	public function update_voter()
	{

	}
}

?>