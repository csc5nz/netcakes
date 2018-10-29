<?php 

include('mailer.php');

session_start();


$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

$db['db_host'] = "ec2-54-221-225-11.compute-1.amazonaws.com";
$db['db_user'] = "giimdycxlnobae";
$db['db_pass'] = "c99958b48fc4bca1342e3649dace0b3e2fc15df3e1499eefee8af3c50a4e3757";
$db['db_name'] = "d5vbcg7i8nd077";
$db['db_port'] = "5432";
foreach($db as $key => $value){
  define(strtoupper($key), $value);
}
$connection = pg_connect("host=".DB_HOST." user=".DB_USER." password=".DB_PASS." dbname=".DB_NAME." port=".DB_PORT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } 
    else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } 
    else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    $message = test_input($_POST["message"]);

  

  
  

  if($connection){
      if($nameErr == "" && $emailErr == "" && $messageErr ==""){
          $res = pg_insert($connection, 'contact_us', $_POST, PGSQL_DML_EXEC);
          if(!$res){
            die("Logging contact failed. Please try again");
          }
          else{
            $_SESSION['success'] = 'Log update successful!';          	
            header('Location: contactUs.php');
            
            // Send confirmation email
          	// To load mailer() function add this line to the top of script -> include('mailer.php');
          	$toEmail = 'netcakesinc@gmail.com';
          	$toName = 'Customer Service';
          	$subject = 'Contact Us';
          	$body = '<h1>Contact Us</h1><p><h3>Name: </h3>' . $name . '<p><h3>Email: </h3>' . $email . '<p><h3>Message:</h3>' . $message;
          	mailer($toEmail, $toName, $subject, $body);
            
            exit();
          
        	}
        }
    }
    else{
        die ("Database connection failed");
    }
};
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
									<li class="current"><a href="contactUs.php">Contact Us</a></li>
                                    <li><a href="signUp.php">Sign Up</a></li>
									<li><a href="login.php">Log In</a></li>
								</ul>
							</nav>

            </header>
        </div>

        <!-- Main -->
        <div id="main-wrapper">
            <div class="container">
                <div class="row gtr-200">
                    <div class="col-8 col-12-medium">
                        <div id="content">

                            <!-- Content -->
                            <article>

                                <h2>Contact Us</h2>

                                <form method="post" action="contactUs.php">
                                    <label>Name </label>
                                    <input type="text" name="name" placeholder = "John Doe"></input><?php echo $nameErr;?>
                                    <label>E-Mail</label>
                                    <input type="email" name="email"placeholder="username@example.com"></input><?php echo $emailErr;?>
                                    <label>Messages</label>
                                    <textarea name="message" placeholder="Please write your message here"></textarea><?php echo $messageErr;?>
                                    <button style="margin-top: 20px">Send!</button>
                                </form>

                            </article>

                        </div>
                    </div>
                    <div class="col-4 col-12-medium">
                        <div id="sidebar">

                            <!-- Sidebar -->
                            <section>
                                <h3>Follow Us</h3>
                                <li><img src="images/facebook.png"></a>  Facebook</li>
                                <li><img src="images/instagram.png">  Instagram</li>
                                <li><img src="images/snapchat.png">Snapchat</li>
                                <li><img src="images/twitter.png">Twitter</li>
                                <footer>
                                    <a href="#" class="button icon fa-info-circle">Find out more</a>
                                </footer>
                            </section>

                        </div>
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
