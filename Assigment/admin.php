<?php
require_once ('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Product</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home</title>
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
    footer{
       margin-top: 50px;
    }
    a.btn.btn-danger {
        margin-left: 15px;
    }
    p.btn.btn-success {
        margin-top: 16px;
    }
    span.btn.btn-primary {
      margin-left: 15px;
  }
  </style>
</head>
<body>
	 <!-- Navigation -->
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
				<h2 style="text-align: center">Product Management</h2>
				<form method="get">
					<input type="text" name="search" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Find by product">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Name Product</th>
							<th>Link Product</th>
							<th>Price Product </th>
							<th>Installment Percentage(%)</th>
							<th>Title</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
if (isset($_GET['search']) && $_GET['search'] != '') {
	$sql = 'select * from product where nameproduct like "%'.$_GET['search'].'%"';
} else {
	$sql = 'select * from product';
}

$productList = executeResult($sql);

$index = 1;
foreach ($productList as $pro) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$pro['nameproduct'].'</td>
			<td><img style = "width:150px;height:150px;"   src ="'.$pro['link'].'"/></td>
			<td>'.$pro['price'].'</td>
			<td>'.$pro['installment'].'</td>
			<td>'.$pro['title'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("AddProduct.php?id='.$pro['id'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteProduct('.$pro['id'].')">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('AddProduct.php', '_self')">Add Product</button>
				<a class="btn btn-dark" href="home.php">Home</a>
			</div>
		</div>
	</div>
    <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Nue</p>
    </div>
    <!-- /.container -->
  </footer>
	<script type="text/javascript">
		function deleteProduct(id) {
			option = confirm('Do you want to delete this product?')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete_product.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>