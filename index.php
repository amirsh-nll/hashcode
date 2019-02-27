<?php
	require_once('hashclass.php');
	$myhash = new HashClass();

	$algorithm_count = $myhash->algorithm_count();
	$hash_count = $myhash->hash_count();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hash Encryption and Reverse Decryption</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
	<div class="container">
		<div class="form">
			<form action="" method="post">
				<label for="string">Encrypt / Decrypt : <small><i>(Not Limit String Length)</i></small></label>
				<input type="text" id="string" name="string" placeholder="Plain String (text) or Hash String" />
				<input type="submit" name="submit" value="Search" />
				<p class="dark-alarm">⛏ Number Of Hashed String Record In Database : <strong><?php echo $hash_count; ?></strong></p>
			</form>
		</div>
	</div>
</body>
</html>