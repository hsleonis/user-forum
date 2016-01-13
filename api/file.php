<?php
/**
 * CricBD image upload API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_FILES)) {
//	
		$api_key=md5($_POST['device_id']);
		$target_file='uploads/user.png';
		if($_FILES["image"]["name"]!='') {
			$target_dir = "uploads/";
			$tmp=basename($_FILES["image"]["name"]);
			$imageFileType = pathinfo($tmp,PATHINFO_EXTENSION);
			$tmp=md5($tmp.''.time()).'.'.$imageFileType;
			$target_file = $target_dir.$tmp;
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		
			$json=array();
		
			$json['message']="Image uploaded!";
			$json['success']=1;
			$json['profile']=$target_file;
			print_r(json_encode($json));
		}
		else echo err_json('Upload Failed!');
//
 }
 else {
	echo err_json('No Image!');
 }
//