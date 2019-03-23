<?php
	
	session_start();
	if(isset($_POST['plainstring']) && !empty($_POST['plainstring']))
	{
		require_once('hashclass.php');
		$myhash = new HashClass();

		$algorithms = $myhash->algorithm();
		$result = "";
		foreach ($algorithms as $ag) {
			$temp = hash($ag['name'], $_POST['plainstring']);
			$result = $result . "* " . $ag['name'] . " : " . $temp . "<br />";
			echo $myhash->insert($_POST['plainstring'], $temp, $ag['id']);
		}

		$_SESSION['result'] = $result;
		header("location:index.php");
	}
	else
	{
		header("location:index.php");
	}

?>