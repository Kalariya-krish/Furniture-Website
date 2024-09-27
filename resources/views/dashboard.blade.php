<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dash</title>
  <link href="{{ URL::to('/')}}/css/nav.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="{{ URL::to('/')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::to('/')}}/css/bootstrap.css">
  <link rel="stylesheet" href="{{ URL::to('/')}}/fontawesome/css/all.css">
  <script src="{{ URL::to('/')}}/js/bootstrap.js" type="text/javascript"></script>
  <script src="{{ URL::to('/')}}/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="{{ URL::to('/')}}/js/jquery.min.js"></script>
  <style>
	body{
		background-color:black;
	}
  </style>
</head>
<body>
	  {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
		<div class="container-fluid">
			<div class="d-flex flex-grow-1">
				<span class="w-100 d-lg-none d-block">
			</span>
				<a class="navbar-brand d-none d-lg-inline-block" href="Index"><b>&nbsp&nbsp&nbsp E-Furniture</b></a>
				<div class="w-100 text-right">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</div>
			<div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
				<ul class="navbar-nav ms-auto flex-nowrap">
					<li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Index">
						  <div>
							<i class="fa-solid fa-user fa-lg mb-1"></i>
						  </div>
						  User Info
						</a>
					  </li>
					  <li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Add">
						  <div>
							<i class="fas fa-user-plus fa-lg mb-1"></i>
						  </div>
						  Add User
						</a>
					  </li>
					<li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Review">
						  <div>
							<i class="fa-solid fa-star fa-lg mb-1"></i>
						  </div>
						  Reviews
						</a>
					  </li>
					<li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Order">
						  <div>
							<i class="far fa-credit-card fa-lg mb-1"></i>
						  </div>
						  Orders
						</a>
					  </li>
					  <li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Addord">
						  <div>
							<i class="far fa-square-plus fa-lg mb-1"></i>
						  </div>
						  Add Order
						</a>
					  </li>
					<li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Product">
						  <div>
							<i class="fas fa-bag-shopping fa-lg mb-1"></i>
						  </div>
						  Products
						</a>
					  </li>
					  <li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Addpro">
						  <div>
							<i class="fa-solid fa-briefcase fa-lg mb-1"></i>
						  </div>
						  Add Product
						</a>
					  </li>
					<li class="nav-item text-center mx-2 mx-lg-1">
						<a class="nav-link" href="Cart">
						  <div>
							<i class="fas fa-cart-shopping fa-lg mb-1"></i>
						  </div>
						  Cart
						</a>
					  </li>
				</ul>
			</div>
		</div>
	</nav> --}}
	<div id="wrapper">
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
		  <ul class="sidebar-nav">
			<li><a href="{{ URL::to('/')}}/Add"><i class="fa-solid fa-user-plus fa-lg mb-1"></i></a>Add Users</li>
			<li><a href="{{ URL::to('/')}}/Addpro"><i class="fa-solid fa-briefcase fa-lg mb-1"></i></a>Add Products</li>
			<li><a href="{{ URL::to('/')}}/Addord"><i class="far fa-square-plus fa-lg mb-1"></i></a>Add Orders</li>
			<li><a href="{{ URL::to('/')}}/Addcart"><i class="fas fa-cart-shopping fa-lg mb-1"></i></a>Add to Cart</li>
			<li><a href="{{ URL::to('/')}}/Addoffer"><i class="fas fa-cart-shopping fa-lg mb-1"></i></a>Add Offer</li>
			<li><a href="{{ URL::to('/')}}/logout"><i class="fas fa-sign-out fa-lg mb-1"></i></a>Logout</li>
		  </ul>
		</div>
		
		<!-- Page Content -->
		<div id="page-content-wrapper">
		  <div class="container-fluid">
			
			  <div class="col-lg-12">
				<a href="#" class="btn" id="menu-toggle"><span class="fa-solid fa-bars" style="color:#ffffff;"></span></a>
				<button class="btn" style="background:#332e39;border-radius:10%;margin-left:20px;margin-top:8px;"><a href="{{ URL::to('/')}}/admin_index"class="btn" style="color:white">Users</a></button>
				<button class="btn" style="background:#332e39;border-radius:10%;margin-left:20px;margin-top:8px;"><a href="{{ URL::to('/')}}/Review"class="btn" style="color:white">Reviews</a></button>
				<button class="btn" style="background:#332e39;border-radius:10%;margin-left:20px;margin-top:8px;"><a href="{{ URL::to('/')}}/Order"class="btn" style="color:white">Orders</a></button>
				<button class="btn" style="background:#332e39;border-radius:10%;margin-left:20px;margin-top:8px;"><a href="{{ URL::to('/')}}/Product"class="btn" style="color:white">Products</a></button>
				<button class="btn" style="background:#332e39;border-radius:10%;margin-left:20px;margin-top:8px;"><a href="{{ URL::to('/')}}/Offer"class="btn" style="color:white">Offer</a></button>
				<button class="btn" style="background:#332e39;border-radius:10%;margin-left:20px;margin-top:8px;"><a href="{{ URL::to('/')}}/Cart"class="btn" style="color:white">Cart Items</a></button>
				@yield('content')
			  </div>
			</div>
		  </div>
		</div>
	  </div>
<script>
		$(document).ready(function(){
  $("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("menuDisplayed");
  });
});
</script>
</body>
</html>