<?php
/**
 * CricBD register API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_POST['device_id'])) {
	$var = sql_data('forum_user',"device_id='".$_POST['device_id']."'");
	if(!$var){
//
			$api_key=md5($_POST['device_id']);
			
			date_default_timezone_set('Asia/Dhaka');
			
			$json=array();
			$args=array(
				'device_id' => $_POST['device_id'],
				'social_id' => isset($_POST['social_id'])?$_POST['social_id']:0,
				'image' => isset($_POST['image'])?$_POST['image']:'uploads/user.png',
				'name' => isset($_POST['name'])?$_POST['name']:'',
				'password' => md5($_POST['password']),
				'api_key' => $api_key,
				'join_date' => date('d-m-Y')
			);
			$chk=insert_data('forum_user', $args);
			
			if($chk) {
				$json['message']="Successfully Registered!";
				$json['success']=1;
				$json['api_key']=$api_key;
				echo json_encode($json);
			}
			else echo err_json('Registration Failed!');
//
	}
	else {
		echo err_json('Device Already Registered.');
	}
}
else {
	echo err_json('Wrong Device ID.');
}
//