<?php
/**
 * AlQuran DB Connect File
 * @author Shahriar
 * @version 1.0.1
*/
 
 $con=@mysql_connect('localhost','dream71_cricket','dream@71');
 if($con) {
	$db=@mysql_select_db('dream71_worldcup');
	if(!$db)
	echo "DB error!";
 }
 else
	echo "Connection Error";
