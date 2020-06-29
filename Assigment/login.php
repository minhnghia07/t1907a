<?php 
require_once('database.php');
session_start();
header('Content-Type: text/html; charset=UTF-8');
if (isset($_COOKIE['status']) && $_COOKIE['status'] == 'success') {
	header('Location: admin.php');
	die();
}
if (!empty($_POST)) {
	$CheckUserName = $CheckPassword = '';
	if (isset($_POST['CheckUserName'])) {
        setcookie('CheckUserName', $_POST['CheckUserName'], time() + 300, '/');
    }
    if (isset($_POST['CheckPassword'])) {
        setcookie('CheckPassword', $_POST['CheckPassword'], time() + 300, '/');
    }
	if (isset($_POST['CheckUserName'])) {
		$_username = $_POST['CheckUserName'];
	}
	if (isset($_POST['CheckPassword'])) {
		$_password = $_POST['CheckPassword'];
	}
	
	if ($user = checkUserLogin($_username, $_password))  {
		header('Location:admin.php');	
	}else{
		echo "You have entered the wrong password :< <a href='javascript: history.go(-1)'>Come back</a>";
	}	 
	die();
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Login</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<div class="form-group">
						<label for="usr">User name :</label>
						<input required="true" type="text" class="form-control" id="usr" name="CheckUserName">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input required="true" type="password" class="form-control" id="pwd" name="CheckPassword">
					</div>
					<button name="login" class="btn btn-success">Login</button> 
					<a style="margin-right: 30px;" href="register.php" class="btn btn-danger">Register</a>
				</form>

			</div>
		</div>
	</div>
</body>
</html>