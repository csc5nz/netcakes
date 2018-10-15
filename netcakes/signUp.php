<?php 

session_start();


$nameErr = $emailErr = $userNameErr = $addressErr = $zipcodeErr = $cityErr = $stateErr = $phoneErr = $passwordErr = $repeat_passwordErr= "";
$name = $email = $username = $address = $zipcode = $city = $state = $phone = $password = "";

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
  if (empty($_POST["username"])) {
    $userNameErr = "Username is required";
} else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $userNameErr = "Only letters and numbers allowed";
    }
}

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
}

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
} else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    }
}

if (empty($_POST["address"])) {
    $addressErr = "Adress is required";
} else {
    $address = test_input($_POST["address"]);
    if (!preg_match("/^[0-9]+\ +[a-zA-Z#. ]*$/",$address)) {
        $addressErr = "Invalid address";
    }
}

if (empty($_POST["city"])) {
    $cityErr = "City is required";
} else {
    $city = test_input($_POST["city"]);
    if (!preg_match("/^[a-zA-Z]*$/",$city)) {
        $cityErr = "Only letters and white space allowed";
    }
}

if (empty($_POST["state"])) {
    $stateErr = "State is required";
} else {
    $state = test_input($_POST["state"]);
}

  if (empty($_POST["zipcode"])) {
    $zipcodeErr = "Zip code is required";
} else {
    $zipcode = test_input($_POST["zipcode"]);
    if (!preg_match("/^[0-9]*$/",$zipcode)) {
        $zipcodeErr = "Only numbers are allowed";
    }
}

if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
} else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match("/^[0-9]*$/",$phone)) {
        $phoneErr = "Only numbers are allowed";
    }
}
  
if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
} 
else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $passwordErr = "Password must contain an uppercase letter, a lowercase letter and a number and must be 8 characters or more";
    }
    else{
      if (empty($_POST["repeat_password"])){
        $repeat_passwordErr = "Please repeat password";
      }
      else{
        $repeat_password = test_input($_POST["repeat_password"]);
        if($password != $repeat_password){
          $repeat_passwordErr = "Passwords must match";
        }
      }
    }
}
  
  

  if($connection){
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      if($nameErr == "" && $emailErr == "" && $userNameErr == "" && $addressErr =="" && $zipcodeErr =="" 
       && $cityErr == "" && $stateErr == "" && $phoneErr ==  "" && $passwordErr ==  "" && $repeat_passwordErr ==  ""){
        unset($_POST['repeat_password']);
        $username_query_res = pg_query_params($connection, 'SELECT * FROM public."User_info" WHERE username = $1', array($_POST['username']));
        $email_query_res = pg_query_params($connection, 'SELECT * FROM public."User_info" WHERE email = $1', array($_POST['email']));
        if(!$username_query_res || !$email_query_res){
          die ("Database Query failed");
        }
        if(pg_num_rows($username_query_res) == 0 && pg_num_rows($email_query_res) == 0){
          $res = pg_insert($connection, 'User_info', $_POST, PGSQL_DML_EXEC);
          if(!$res){
            die("Adding User failed. Please try again");
          }
          else{
          	$_SESSION['success'] = 'Sign up successful!';
            header('Location: login.php');
            exit();
        	}
        }
        else{
          if(pg_num_rows($username_query_res) > 0){
            $userNameErr = "A user with that username already exists.";
          }
          if(pg_num_rows($email_query_res) > 0){
            $emailErr = "A user with that email already exists.";
          }
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
                <li></li>
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
<form method="post" action="signUp.php">
    				<!-- username field-->
            <div class="form-group">
                <label for="username">Username: </label><input class="form-control" type = "text" name = "username" value="<?php echo $username;?>">
                <span class="error"><?php echo $userNameErr;?></span>
            </div>

            <!-- email field-->
            <div class="form-group">
                <label for="email">Email: </label><input class="form-control" type = "email" name = "email" value="<?php echo $email;?>">
                <span class="error"><?php echo $emailErr;?></span>
            </div>

            <!-- name -->
            <div class="form-group">
                <label for="name">Name: </label><input class="form-control" type = "text" name = "name" value="<?php echo $name;?>">
                <span class="error"><?php echo $nameErr;?></span>
            </div>

            <!-- address -->
            <div class="form-group">
                <label for="address">Address: </label><input class="form-control" type = "text" name = "address" value="<?php echo $address;?>">
                <span class="error"><?php echo $addressErr;?></span>
            </div>

            <!-- City -->
            <div class="form-group">
                <label for="city">City: </label><input class="form-control" type = "text" name = "city" value="<?php echo $city;?>">
                <span class="error"><?php echo $cityErr;?></span>
            </div>

            <!-- State -->
            <div class="form-group">
                <label for="state">State: </label><select class="form-control" name = "state">
                    <!-- will add more states -->
                    <option value="">----Select State----</option>
                    <option value="AL" <?php if ($state=="AL") echo "selected";?>>Alabama</option>
                    <option value="AK" <?php if ($state=="AK") echo "selected";?>>Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <span class="error"><?php echo $stateErr;?></span>
            </div>

            <!-- zip code -->
            <div class="form-group">
                <label for="zipcode">Zip Code: </label><input class="form-control" type = "text" name = "zipcode" maxlength="5" minlength="5" value="<?php echo $zipcode;?>">
                <span class="error"><?php echo $zipcodeErr;?></span>
            </div>

            <!-- phone number -->
            <div class="form-group">
                <label for="phone">Phone number: </label><input class="form-control" type = "text" name = "phone" maxlength="10" minlength="10" value="<?php echo $phone;?>">
                <span class="error"><?php echo $phoneErr;?></span>
            </div>

            <!-- password field -->
            <div class="form-group">
                <label for="password">Password: </label><input class="form-control" type = "password" name = "password" >
              	<span class="error"><?php echo $passwordErr;?></span>	
            </div>

            <div class="form-group">
                <label for="password">Repeat Password: </label><input class="form-control" type = "password" name = "repeat_password" >
           		  <span class="error"><?php echo $repeat_passwordErr;?></span>	
  					</div>
    <!-- Sign UP button -->
    <button class="button btn btn-lg btn-block btn-secondary" id="login-button"> Sign Up </button>
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
                    <li></li>
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



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>