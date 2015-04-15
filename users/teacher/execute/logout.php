<?php 
include '../../student/execute/connect.php';
include '../../student/execute/functions.php';
session_destroy();
header('location: ../../../login/form.php?logout=done');
?>