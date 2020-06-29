<?php
require_once('database.php');
$_contact= $_nameproduct = '';
if (isset($_POST['contact'])) {
		$_contact = $_POST['contact'];
	}
if (isset($_POST['nameproduct'])) {
		$_nameproduct = $_POST['nameproduct'];
	}
$_contact = str_replace('\'', '\\\'', $_contact);
if ($_contact != '' && $_nameproduct != '') {
	$sql = "insert into contact(nameproduct, contact) values ('$_nameproduct
		', '$_contact')";
		execute($sql);
		header('Location:feedback.php');
die();
}
// execute($sql);
// die();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Product</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			margin-top: 100px;
		}
		footer.py-5.bg-dark {
			margin-top: 250px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Shop Nue</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link" href="home.php">Home							
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="contact.php">Contact</a>
						<span class="sr-only">(current)</span>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Feedback</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="nameproduct"> Name Product:</label>
						<input type="text" class="form-control" placeholder="Username......" id="nameproduct" name="nameproduct">
					</div>																			
					<div class="form-group">
						<label for="contact">Feedback:</label>
						<input type="text" class="form-control" placeholder="Comment......" id="contact" name="contact">
					</div>
					<button class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Your Nue</p>
		</div>
		<!-- /.container -->
	</footer>
</body>
</html>