<?php

/**
 * Hash Class
 */
class HashClass
{
	/* Private */
	private $connection;
	private function clean($string)
	{
		$string = ltrim(rtrim(trim($string)));
		$string = addslashes($string);
		$string = @trim($string);
		if(get_magic_quotes_gpc())
			$string = stripslashes($string);
		$string = htmlspecialchars($string);
		return $string;	
	}
	private function connect(){
		$server='localhost';
		$username='root';
		$password='';
		$dbName='db_hash';		
		if(!@$connection = mysqli_connect($server, $username, $password, $dbName))
			die(' ');
		mysqli_query($connection,'SET CHARACTER SET utf8;');
		return $connection;		
	}

	/* Public */
	public function __construct()
	{
		$this->connection = $this->connect();
	}

	public function hash_count()
	{
		$query = "SELECT sum('sum') FROM 'tbl_algorithm'";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			$row = mysqli_fetch_row($result);
			$sum = $row[0];
		}
		else
			return 0;
	}

	public function algorithm_count()
	{
		$query = "SELECT * FROM 'tbl_algorithm'";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			return mysqli_num_rows($result);
		}
		else
			return 0;
	}


}


?>