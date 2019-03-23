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
		$query = "SELECT COUNT(*) as 'count' FROM `tbl_data`";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			$row = mysqli_fetch_row($result);
			$count = $row[0];
			return $count;
		}
		else
			return 0;
	}

	public function algorithm_count()
	{
		$query = "SELECT * FROM `tbl_algorithm`";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			return mysqli_num_rows($result);
		}
		else
			return 0;
	}

	public function find_algorithm($id)
	{
		$id = $this->clean($id);

		if(empty($id) || !is_numeric($id))
			return -1;

		$query = "SELECT * FROM `tbl_algorithm` WHERE `id` ='" . $id . "'";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			$result = mysqli_fetch_row($result);
			return $result[1];
		}
		else
			return 0;
	}

	public function algorithm()
	{
		$query = "SELECT * FROM `tbl_algorithm`";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			return $result;
		}
		else
			return 0;
	}

	public function insert($string, $hashed, $algorithm)
	{

		$string = $this->clean($string);
		$hashed = $this->clean($hashed);
		$algorithm = $this->clean($algorithm);

		if(!is_numeric($algorithm) || empty($string) || empty($hashed) || empty($algorithm))
			return -1;

		$query = "SELECT * FROM `tbl_data` WHERE `normal_string` ='" . $string . "' AND `type` ='" . $algorithm . "'";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			if(mysqli_num_rows($result) < 1)
			{
				$query = "INSERT INTO `tbl_data`(`normal_string`, `hash_string`, `type`) VALUES ('" . $string . "', '" . $hashed . "', '" . $algorithm ."')";
				$result = mysqli_query($this->connection, $query);
				if ($result !== false)
					return 1;
				else
					return 0;
			}
			else
				return 0;
		}
		else
			return 0;
	}

	public function find($hashed)
	{
		$hashed = $this->clean($hashed);

		if(empty($hashed))
			return -1;

		$query = "SELECT * FROM `tbl_data` WHERE `hash_string` ='" . $hashed . "'";
		$result = mysqli_query($this->connection, $query);
		if ($result !== false) {
			$result = mysqli_fetch_row($result);
			return $result;
		}
		else
			return 0;
	}

}


?>