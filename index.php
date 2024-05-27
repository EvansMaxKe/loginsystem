<?php require("header.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" text="white">

	<?php 
		if (isset($_SESSION['userId'])) {
			echo '<p class="login-status">You are logged in!!</p>';
		}
		else{
			echo '<p class="login-status">You are logged out!!</p>';
		}
	?>






<?php require("footer.php"); ?>
</body>
</html>