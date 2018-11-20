<?php
session_start();

$user = "";

?>
<!DOCTYPE HTML>

<html>
<head>
	<title>Netcakes</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) {
		document.getElementById("promo1").addEventListener("click", function(){
			var promo1val = document.getElementById("promo1val").value;
			if(promo1val === "CAKES"){
				document.getElementById("cake_price").innerText = "$8.00";
				document.getElementById("price_data_1").value = "Gst382qXB8k8GnceyK1SmD";
			}
	}) 
		document.getElementById("promo2").addEventListener("click", function(){
			var promo2val = document.getElementById("promo2val").value;
			if(promo2val === "YUM"){
				document.getElementById("cupcake_price").innerText = "$2.50";
				document.getElementById("price_data_2").value = "77i8EwQRDctWGtB7bpEnsx"
			}
	}) 

}
	
	);
</script>
<body class="is-preload homepage">
	<div id="page-wrapper">
		<!-- Header -->
		<div id="header-wrapper">
			<header id="header" class="container">

				<!-- Logo -->
				<div id="logo">
					<h1 ><img src="images/icon07.png" alt=""><a href="index.php">Netcakes</a></h1>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>

						<li class="current"><a href="index.php">Welcome</a></li>
						<li><a href="about-us.php">About Us</a></li>
					</li>
					<li><a href="contactUs.php">Contact Us</a></li>
					<?php 
					if(isset($_SESSION['username'])){
						echo "<li><a href='member_index.php'>".$_SESSION['username']."</a></li>";
						echo "<li><a href='logout.php'>Log Out</a></li>";
					}
					else{
						echo "<li><a href='signUp.php'>Sign Up</a></li>";
						echo "<li><a href='login.php'>Log In</a></li>";
					}
					?>
				</ul>
			</nav>

		</header>
	</div>

	<!-- Features -->
	<div id="features-wrapper">
		<div class="container">
			<div class="row">
				
				<div class="col-6 col-12-medium">
					<!-- Box -->
					<section class="box feature">
						<a href="#" class="image featured"><img src="images/cake.jpg" alt="" /></a>
						<div class="inner">
							<header>
								<h2>Layered Cake</h2>
								<p id="cake_price">$10.00</p>
							</header>
							<h2>Select Flavor</h2>
							<input style="appearance:radio; -webkit-appearance: radio"type="radio" name="flavor" value="Chocolate" checked>Chocolate
							<input style="appearance:radio; -webkit-appearance: radio"type="radio" name="flavor" value="Vanilla">Vanilla <br><br>
							<h2>Select Filling</h2>
							<input style="appearance:radio; -webkit-appearance: radio; margin-bottom: 10px;" type="radio" name="filling" value="Chocolate" checked>Chocolate
							<input style="appearance:radio; -webkit-appearance: radio;"type="radio" name="filling" value="Vanilla">Vanilla<br><br>
							<input id="promo1val" type="text" >
							<input type="submit" id="promo1" value="Apply Promo">
							<br><br>
							<form method="post" action="save_order.php">
								<input type="hidden" name="item" value="Layered Cake" />
								<input type="hidden" name="price" value="10.00" />
								<input type="hidden" id = "price_data_1" name="data" value="EXKjPnaCXdY2dfeD7Fs7yd" />
								<input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 210px;" alt="BitPay, the easy way to pay with bitcoins." >
							</form>
						</section>
					</div>
					
					<div class="col-6 col-12-medium">
					<!-- Box -->
					<section class="box feature">
						<a href="#" class="image featured"><img src="images/Cupcakes.jpg " alt="" /></a>
						<div class="inner">
							<header>
								<h2>Dozen Cupcakes</h2>
								<p id="cupcake_price">$3.00</p>
							</header>
							<h2>Select Flavor</h2>
							<form method="post" action="save_order.php">
								<input style="appearance:radio; -webkit-appearance: radio"type="radio" name="flavor" value="Chocolate" checked>Chocolate
								<input style="appearance:radio; -webkit-appearance: radio"type="radio" name="flavor" value="Vanilla">Vanilla <br><br>
								<h2>Select Filling</h2>
								<input style="appearance:radio; -webkit-appearance: radio; margin-bottom: 10px;" type="radio" name="filling" value="Chocolate" checked>Chocolate
								<input style="appearance:radio; -webkit-appearance: radio;"type="radio" name="filling" value="Vanilla">Vanilla<br><br>
								<input id="promo2val" type="text" >
								<input type="submit" id="promo2" value="Apply Promo">
								<br><br>
								<input type="hidden" name="item" value="Dozen Cupcakes" />
								<input type="hidden" name="price" value="3.00" />
								<input type="hidden" id="price_data_2" name="data" value="41NGL7cWLGebMJpuJC418n" />
								<input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 210px;" alt="BitPay, the easy way to pay with bitcoins." >
							</form>
						</div>
					</section>
				</div>

				
			</div>
		</div>
	</div>


	<!-- Footer -->
	<div id="footer-wrapper">
		<footer id="footer" class="container">
			<div class="row">
				<div class="col-3 col-6-medium col-12-small">

					<!-- Links -->
					<section class="widget links">
						<h3>Directory</h3>
						<ul class="style2">
							<li><a href="index.php">Welcome</a></li>
							<li><a href="about-us.php">About Us</a></li>
						</li>
						<li><a href="contactUs.php">Contact Us</a></li>
						<li class="current"><a href="signUp.php">Sign Up</a></li>
						<li><a href="login.php">Log In</a></li>
					</ul>
				</section>

			</div>

			<div class="col-3 col-6-medium col-12-small">

				<!-- Contact -->
				<section class="widget contact last">
					<h3>Contact Us</h3>
					<ul>
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
					</ul>
					<p>1234 Fictional Road<br />
						Charlottesville, VA 22904<br />
					(800) 555-0000</p>
				</section>

			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div id="copyright">
					<ul class="menu">
						<li>
						&copy; Netcakes. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div>

</div>

<!-- Scripts -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
