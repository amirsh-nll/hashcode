<?php
	
	session_start();
	if(isset($_POST['hashstring']) && !empty($_POST['hashstring']))
	{
		require_once('hashclass.php');
		$myhash = new HashClass();

		
		$find = $myhash->find($_POST['hashstring']);

		if($find === -1 || $find === 0)
			$_SESSION['decode'] = "Sorry, Not Found...!!";
		else
		{
			$algorithm = $myhash->find_algorithm($find[3]);
			if($algorithm === -1 || $algorithm === 0)
				$_SESSION['decode'] = "Sorry, Not Found...!!";
			else 
				$_SESSION['decode'] = "Search String : " . $_POST['hashstring'] . "<br /> Decoded String ( " . $algorithm . " ) : " . $find[1];
		}

		header("location:index.php");
	}
	else
	{
		header("location:index.php");
	}

?>