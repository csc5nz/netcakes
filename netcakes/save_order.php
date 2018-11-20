 
<?php
session_start();

$user = $item = $price = $data ="";
//$_SESSION['username'] = "csc5nz2";

if (isset($_POST['item'])) {
    $item = $_POST['item'];
} else {
    // Fallback behaviour goes here
}
if (isset($_POST['price'])) {
    $price = $_POST['price'];
} else {
    // Fallback behaviour goes here
}
if (isset($_POST['data'])) {
    $data = $_POST['data'];
} else {
    // Fallback behaviour goes here
}


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
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    if($connection){
        $connection = pg_connect("host=".DB_HOST." user=".DB_USER." password=".DB_PASS." dbname=".DB_NAME." port=".DB_PORT);

        // Save order into database
            $res = pg_query($connection, "insert into orders (username, item, price) values ('".$user."','".$item."','".$price."');");
            
            if(!$res){
                die("Adding Order failed. Please try again");
            }
            else{
//                 // Send post request to bitpay
//                 $url = 'https://test.bitpay.com/checkout';
//                 $payload = array('action' => 'cartAdd', 'data' => $data);
// 
//                 // use key 'http' even if you send the request to https://...
//                 $options = array(
//                     'http' => array(
//                         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//                         'method'  => 'POST',
//                         'content' => http_build_query($payload)
//                     )
//                 );
//                 $context  = stream_context_create($options);
//                 $result = file_get_contents($url, false, $context);
//                 if ($result === FALSE) { /* Handle error */ }
// 
//                 var_dump($result);
//             
//                 exit();
            }
        }
    }
}

?>


<form action="https://test.bitpay.com/checkout" method="post" name="bitpay_form">
    <input type="hidden" name="action" value="cartAdd" />
    <input type="hidden" name="data" value="<?php echo $data; ?>" />
    <!--<input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 210px;" alt="BitPay, the easy way to pay with bitcoins." >-->
</form>
							
							<?
echo "<script type=\"text/javascript\"> 
                window.onload=function(){
                    document.forms['bitpay_form'].submit();
                }
       </script>";
?>
