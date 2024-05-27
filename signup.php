

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="signup.css">
	<title>SIGNUP PAGE</title>
</head>
<body ><?php require("header.php"); ?>
<div class="content" align="center">
	<h2>SIGN-UP PAGE</h2>
	<?php 
		if (isset($_GET['error'])) {
			if ($_GET['error']=="emptyfields") {
				echo '<p class="signuperror">FILL IN ALL FIELDS!</p>';
			}
			elseif ($_GET['error']=="invalidmail") {
				echo '<p class="signuperror">Invalid E-mail!</p>';
			}
			elseif ($_GET['error']=="invaliduidmail") {
				echo '<p class="signuperror">Inalid E-mail and Username</p>';
			}
			elseif ($_GET['error']=="invaliduid") {
				echo '<p class="signuperror">Invalid Username!</p>';
			}
			elseif ($_GET['error']=="passwordcheck") {
				echo '<p class="signuperror">Your Password Do not match!</p>';
			}
			elseif ($_GET['error']=="usertaken") {
				echo '<p class="signuperror">Username is Already taken!</p>';
			}
		}  
		elseif ($_GET['signup']=="success") {
				echo '<p class="signupsucess">Sign-Up Success!</p>';
				 require("footer.php"); 
			}

	?>
	<form action="includes/signup.inc.php" method="POST">
		<input type="text" name="uid" placeholder="username">
		<input type="text" name="mail" placeholder="E-mail" >
		<input type="password" name="pwd" placeholder="password">
		<input type="password" name="pwd-repeat" placeholder="Repeat-password">
		<button type="submit" name="signup-submit">Sign Up</button>
	</form>
</div>



<?php require("footer.php"); ?>
</body>
</html>