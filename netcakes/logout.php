<?php session_start(); ?>

<?php 

$_SESSION['username'] = null;
    
header("Location: index.php");
session_destroy();
?>