<?php
//to check if the user hit the submit button
if (isset($_POST['signup-submit'])) {
	require 'dbh.inc.php';

$username=$_POST['uid'];
$email=$_POST['mail'];
$password=$_POST['pwd'];
$passwordRepeat=$_POST['pwd-repeat'];

//to check if fields are empty
if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
	header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
	//echo "<sript>alert ('emptyfileds');</script>";
	exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z0-9]*$/",$username)){
header("Location: ../signup.php?error=invaliduidmail");
	exit();
}
//to check if user entered valid email
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../signup.php?error=invalidmail&uid=".$username);
	exit();
}

//to check if user entered valid password
else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	// to display if invalid email
	header("Location: ../signup.php?error=invaliduid&mail".$email);
	exit();
}
//to check if the passwords match
else if($password !== $passwordRepeat){
	header("Location:../signup.php?error=passwordcheck&uid".$username."&mail".$email);
}
//to check if the username already exists
else{
	$sql="SELECT uidUsers FROM users WHERE uidUsers=?";
	$stmt=mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location:../signup.php?error=sqlerror");
	exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck=mysqli_stmt_num_rows($stmt);
		if ($resultCheck>0) {
			header("Location:../signup.php?error=usertaken&mail".$email);
	exit();
		}
		else{
			$sql="INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)";
			$stmt=mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location:../signup.php?error=sqlerror");
			exit();
			}
			else{
				$hashedPwd=password_hash($password, PASSWORD_DEFAULT);
				//sss means strings coz in the insert in sql we have 3 strings
				mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);
				mysqli_stmt_execute($stmt);
				header("Location: ../signup.php?signup=success");
				<?php require("footer.php");  
			exit();
				
			}

		}
	}

}  
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
header("Location:../signup.php");
exit();

?>