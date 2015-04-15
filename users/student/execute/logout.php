
<!-- create 5th -->
<?php 
include 'connect.php';
include 'functions.php';
session_destroy(); //destory currently session and redirect us to:
header('location: ../../../login/form.php?logout=done');
?>