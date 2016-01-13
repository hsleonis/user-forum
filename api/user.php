<?php
/**
 * CricBD user API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_POST['api_key'])) {
	$var = sql_data('forum_user',"api_key='".$_POST['api_key']."'");
	if($var){
//	
			$json=array();
			$json['data']=array();
		
			$json['success']=1;
			$json['message']='User information';
			$json['data']=array();
			$json['data']['uid']=$var['uid'];
			$json['data']['social_id']=$var['social_id'];
			$json['data']['image']=$var['image'];
			$json['data']['name']=$var['name'];
			$json['data']['join_date']=$var['join_date'];
			$json['data']['api_key']=$var['api_key'];
			
			echo json_encode($json);
//
	}
	else {
		echo err_json('Wrong info! Please login.');
	}
}
else {
	echo err_json('Please Login!');
}
//
