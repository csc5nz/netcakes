<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Netcakes</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload homepage"id="sign-up-body">
	
	<div id="header-wrapper">
		<header id="header" class="container">
	
			<div id="logo">
                <h1 ><img src="images/icon07.png" alt=""><a href="index.php">Netcakes</a></h1>
            </div>

			<nav id="nav">
				<ul>
					<li><a href="index.php">Welcome</a></li>
					<li><a href="about-us.php">About Us</a></li>
					</li>
					<li><a href="contactUs.php">Contact Us</a></li>
                    <li class="current"><a href="signUp.php">Sign Up</a></li>
					<li><a href="login.php">Log In</a></li>
				</ul>
			</nav>

		</header>
	</div>
<div id="main-signUp">
	<div id='login-box' class="container box">
	<h1 style= "font-size: 50px; text-align: center" >Sign Up</h1>
	<form id="login-form" action = "/login", method = "POST">
		<!-- username field-->
		<div class="form-group">
			<label for="username">Username: </label><input class="form-control" type = "text" name = "username">
		</div>
		
		<!-- email field-->
		<div class="form-group">
			<label for="email">Email: </label><input class="form-control" type = "email" name = "email">
		</div>
		
		<!-- name -->
		<div class="form-group">
			<label for="name">Name: </label><input class="form-control" type = "text" name = "name">
		</div>
		
		<!-- address -->
		<div class="form-group">
			<label for="address">Address: </label><input class="form-control" type = "text" name = "address">
		</div>
		
		<!-- City -->
		<div class="form-group">
			<label for="city">City: </label><input class="form-control" type = "text" name = "city">
		</div>
		
		<!-- State -->
		<div class="form-group">
		<label for="state">State: </label><select class="form-control" name = "state">
            <!-- will add more states -->
            <option value="VA">VA</option>
            <option value="MD">MD</option>
            <option value="DC">DC</option>
        </select>
        </div>
		
		<!-- zip code -->
		<div class="form-group">
			<label for="zip_code">Zip Code: </label><input class="form-control" type = "text" name = "zip_code" maxlength="5" minlength="5">
		</div>
		
		<!-- phone number -->
		<div class="form-group">
			<label for="phone">Phone number: </label><input class="form-control" type = "text" name = "phone">
		</div>
		
		<!-- password field -->
		<div class="form-group">
			<label for="password">Password: </label><input class="form-control" type = "password" name = "password" >
		</div>

		<div class="form-group">
			<label for="password">Repeat Password: </label><input class="form-control" type = "password" name = "password" >
		</div>
		
		<!-- Login button -->
		<button class="button btn btn-lg btn-block btn-secondary" id="login-button"> Sign Up </input>
		</form>
	</div>
</div>


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
-->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
