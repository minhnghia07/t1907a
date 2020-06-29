<?php
require_once ('database.php');

$_nameproduct = $_link = $_price = $_installment = $_title ='';

if (!empty($_POST)) {
	$_id = '';

	if (isset($_POST['nameproduct'])) {
		$_nameproduct = $_POST['nameproduct'];
	}
	if (isset($_POST['link'])) {
		$_link = $_POST['link'];
	}
	if (isset($_POST['price'])) {
		$_price	 = $_POST['price'];
	}

	if (isset($_POST['installment'])) {
		$_installment = $_POST['installment'];
	}

	if (isset($_POST['title'])) {
		$_title = $_POST['title'];
	}

	if (isset($_POST['id'])) {
		$_id = $_POST['id'];
	}

	$_nameproduct = str_replace('\'', '\\\'', $_nameproduct);
	$_link  = str_replace('\'', '\\\'', $_link);
	$_price      = str_replace('\'', '\\\'', $_price);
	$_installment       = str_replace('\'', '\\\'', $_installment);
	$_title       = str_replace('\'', '\\\'', $_title);


	if ($_id != '') {
		//update
		$sql = "update product set nameproduct = '$_nameproduct', link = '$_link', price = '$_price' , installment = '$_installment',title = '$_title' where id = " .$_id;
	} else {
		//insert
		$sql = "insert into product(nameproduct, link, price,installment,title) value ('$_nameproduct
		', '$_link', '$_price','$_installment','$_title')";
	}
	execute($sql);

	header('Location: admin.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from product where id = '.$id;
	$productList = executeResult($sql);
	if ($productList != null && count($productList) > 0) {
		$prd        = $productList[0];
		$_nameproduct = $prd['nameproduct'];
		$_link      = $prd['link'];
		$_price  = $prd['price'];
		$_installment  = $prd['installment'];
		$_title  = $prd['title'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
            margin-top: 100px;
        }
	</style>
</head>
<body>
	 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">ShopNue</a>
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
            <a class="nav-link" href="contact.php">Contact</a>
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
				<h2 class="text-center">Add product</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Name Product:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="nameproduct" value="<?=$_nameproduct?>">
					</div>
					<div class="form-group">
					  <label for="link">Link Product:</label>
					  <input type="text" class="form-control" id="link" name="link" value="<?=$_link?>">
					</div>
					<div class="form-group">
					  <label for="price">Price:</label>
					  <input type="text" class="form-control" id="price" name="price" value="<?=$_price?>">
					</div>
					<div class="form-group">
					  <label for="installment"> Installment Percentage:</label>
					  <input type="number" class="form-control" id="installment" name="installment" value="<?=$_installment?>">
					</div>
					<div class="form-group">
					  <label for="title">Title:</label>
					  <input type="text" class="form-control" id="title" name="title" value="<?=$_title?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>