<?php 
session_start();
require_once('database.php');
// require_once('GetIdProduct.php');
$id  = $sql  = $view = '';
if (!empty($_GET)) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
}

$product[] = array();
$sql = "SELECT * FROM `product` where id =" . $id;
$product = executeResult($sql);

foreach ($product as $pro) {
					$view.='<div class="card mt-4">
					<img class="card-img-top img-fluid" src='.$pro['link'].' alt="">
					<div class="card-body">
					<h3 class="card-title">'.$pro['nameproduct'].'</h3>
					<h4>'.$pro['price'].'$</h4>
					<h2>Tra gop : '.$pro['installment'].'%</h2>
					<p class="card-text">'.$pro['title'].'</p>
					<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
					4.0 stars
					</div>
					</div>';
				}
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Product details</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- Custom styles for this template -->
	<style type="text/css">
		body{
			padding-top: 56px;
		}
	</style>
</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Product details</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="home.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<div class="col-lg-3">
				<h1 class="my-4">Category</h1>
				<div class="list-group">
					<a href="#" class="list-group-item active">Car</a>
					<a href="#" class="list-group-item"> Motorcycle</a>
					
				</div>
			</div>
			<!-- /.col-lg-3 -->

			<div class="col-lg-9">		
				<?=$view?>
				<!-- /.card -->

				<div class="card card-outline-secondary my-4">
					<div class="card-header">
						Product Reviews
					</div>
					<div class="card-body">
						<p>With eye-catching exterior, interior space changes markedly in a more luxurious way with a series of modern features. Coupled with a good price and a famous Japanese brand, the Mazda 6 is truly a worth buying car because it only needs to move a few tens of millions more from Kia Optima.</p>
						<small class="text-muted">Posted by Anonymous on 3/1/17</small>
						<hr>
						
						<a href="#" class="btn btn-success">Leave a Review</a>
					</div>
				</div>
				<!-- /.card -->

			</div>
			<!-- /.col-lg-9 -->

		</div>

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
