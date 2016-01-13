<?php
/**
 * CricBD Forum Index file
 * @author Shahriar
 * @version 1.0.1
*/
	session_start();
	if(!isset($_SESSION['logged'])) header('location: login');
	
	require_once('config/function.php');
	require_once('config/connect.php');
	require_once('config/db.php');
	
	require_once('admin/header.php');
	require_once('admin/footer.php');