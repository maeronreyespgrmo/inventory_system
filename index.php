<?php
session_start();
if(!isset($_SESSION['username']))
header('location:home');
else
header('location:customer/home');
?>