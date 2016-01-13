<?php
/**
 * CricBD login API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
// 
if(isset($_POST['device_id'])) {
	$var = sql_data('forum_user',"device_id='".$_POST['device_id']."'");
	if($var){
		
		if(md5($_POST['password'])==$var['password']){
//	
			$json=array();
			$json['data']=array();
		
			$json['success']=1;
			$json['message']='Logged in Successfully.';
			$json['data']=array();
			$json['data']['uid']=$var['uid'];
			$json['data']['social_id']=$var['social_id'];
			$json['data']['image']=$var['image'];
			$json['data']['name']=$var['name'];
			$json['data']['join_date']=$var['join_date'];
			$json['data']['api_key']=$var['api_key'];
			
			echo json_encode($json);
		}
		else echo err_json('Wrong Password.');
//
	}
	else {
		echo err_json('Device not registered!');
	}
}
else {
	echo err_json('Wrong Device ID.');
}
//
