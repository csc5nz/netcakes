<?php 

include('mailer.php');

session_start();

if(!isset($_SESSION['username'])){
    $_SESSION['failure'] = "You're not logged in";
    header('Location: login.php');
    exit();
}

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";
$username = "";


$db['db_host'] = "ec2-54-221-225-11.compute-1.amazonaws.com";
$db['db_user'] = "giimdycxlnobae";
$db['db_pass'] = "c99958b48fc4bca1342e3649dace0b3e2fc15df3e1499eefee8af3c50a4e3757";
$db['db_name'] = "d5vbcg7i8nd077";
$db['db_port'] = "5432";
foreach($db as $key => $value){
  define(strtoupper($key), $value);
}
$connection = pg_connect("host=".DB_HOST." user=".DB_USER." password=".DB_PASS." dbname=".DB_NAME." port=".DB_PORT);


    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    else{
        header('Location: login.php');
        $_SESSION['failure'] = "The username doesn't exist in the database";
        exit();
    }
    if($connection){
		$query_res = pg_query($connection, "select * from \"User_info\" where username='". $username . "';");
        if(!$query_res){
            die ("Database Query failed");
        }
        if(pg_num_rows($query_res) > 0){
            $row = pg_fetch_assoc($query_res);
            //$email = pg_fetch_assoc($query_res)['email'];
            //$name = pg_fetch_assoc($query_res)['name'];
            //exit();
        }
        else{
            $_SESSION['failure'] = "The username doesn't exist in the database";
        }
    }
	else{
		die ("Database connection failed");
	}
    
    

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>

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
<body class="is-preload right-sidebar">
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
						<li><a href="index.php">Welcome</a></li>
						<li><a href="about-us.php">About Us</a></li>
						</li>
						<li><a href="contactUs.php">Contact Us</a></li>
                        <?php 
                            if(isset($_SESSION['username'])){
                                echo "<li class='current'><a href='member_index.php'>".$_SESSION['username']."</a></li>";
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
        
        <!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="col-7 col-12-medium">
								<h2>Member Page </h2>
								<!--<form method="post" action="contactUs.php">-->
								<p><?php echo $_SESSION['username'];?></p>
                                    <p style="font-size:140%;">
                                    <label>Name: </label>
                                    <?php echo $row['name'];?><br>
                                    <label>E-Mail: </label>
                                    <?php echo $row['email'];?><br>
                                    <label>Address: </label>
                                    <?php echo $row['address'];?><br>
                                    <label>State: </label>
                                    <?php echo $row['state'];?><br>
                                    <label>Zip: code </label>
                                    <?php echo $row['zipcode'];?><br>
                                    <label>Phone number: </label>
                                    <?php echo $row['phone'];?></p>
                                    
                                    <!--<button style="margin-top: 20px">Send!</button>-->
                                <!--</form>-->
							</div>
							<div class="col-5 col-12-medium">
								<ul>
									<li><a href="product.php" class="button large icon fa-cart-plus">Order Now</a></li>
									<li><a href="edit_profile.php" class="button alt large icon fa-user">Edit Profile</a></li>
								</ul>
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
