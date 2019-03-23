<?php
	session_start();
	require_once('hashclass.php');
	$myhash = new HashClass();

	$algorithm_count = $myhash->algorithm_count();
	$hash_count = $myhash->hash_count() / $algorithm_count;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hash Encryption and Reverse Decryption</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
</head>
<body>
	<div class="container">
		<div class="form">

			<form action="encrypt.php" method="post">
				<label for="plainstring">Encrypt : <small><i>(Not Limit String Length)</i></small></label>
				<input type="text" id="plainstring" name="plainstring" placeholder="Plain String (text)" />
				<input type="submit" name="hash" value="Hash" />
				<?php
					if(isset($_SESSION['result']) && !empty($_SESSION['result']))
					{
						echo "<div class='result-box'><strong>Result : </strong><br />" . $_SESSION['result'] . "</div>";
						unset($_SESSION['result']);
					}
				?>
			</form>
			<p>&nbsp;</p>
			<form action="decrypt.php" method="post">
				<label for="hashstring">Decrypt : <small><i>(Not Limit String Length)</i></small></label>
				<input type="text" id="hashstring" name="hashstring" placeholder="Hash String" />
				<input type="submit" name="search" value="Search" />
				<?php
					if(isset($_SESSION['decode']) && !empty($_SESSION['decode']))
					{
						if($_SESSION['decode'] === "Sorry, Not Found...!!")
							echo "<div class='result-error-box'><strong>Result : </strong><br />" . $_SESSION['decode'] . "</div>";
						else
							echo "<div class='result-box'><strong>Result : </strong><br />" . $_SESSION['decode'] . "</div>";
						unset($_SESSION['decode']);
					}
				?>
			</form>

			<p class="dark-alarm">⛏ Number Of Hashed String Record In Database : <strong><?php echo $hash_count; ?></strong></p>

		</div>
	</div>
</body>
</html>