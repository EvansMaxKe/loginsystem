<!-- //creating the header -->
<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link type="text/css" rel="stylesheet" href="header.css">
</head>
<body>
	<header>
		<div class="nav">
			<a class="navbrand" href="#"><img src="assets/img/1.gif" width="60px" height="60px"><span><h2>E'MAXTECH</h2></span></a>
			<div class="menus">
				<ul>
					<li class="links"><a href="#">HOME</a></li>
					<li class="links"><a href="#">CONTACTUS</a></li>
					<li class="links"><a href="#">ABOUT</a></li>
				</ul>
			</div>
			<div class="forms">
				<?php 
					if (isset($_SESSION['userId'])) {
						echo '<form method="POST" action="includes/logout.inc.php">
					<button type="submit" class="logoutsubmit" name="logout-submit">LOGOUT</button>
				</form>';
					}
					else{
						echo '<form action="includes/login.inc.php" method="POST" class="login">
					<input type="text" name="mailuid" placeholder="username/E-mail" >
					<input type="password" name="pwd" placeholder="password..." >
					<button type="submit" class="loginsubmit" name="login-submit">LOGIN</button>
				</form>';
					}
				?>
				
				<a href="signup.php">SIGNUP</a>
				
			</div>
		</div>

	</header>
</body>
</html>