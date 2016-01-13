<?php
/**
 * CricBD post API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_POST['api_key'])) {
	$var = sql_data('forum_user',"api_key='".$_POST['api_key']."'");
	if($var){
		
		if(isset($_POST['post_desc']) && $_POST['post_desc']!=""){
//			
			date_default_timezone_set('Asia/Dhaka');
			$json=array();
			$args=array(
				'uid' => $var['uid'],
				'post_desc' => $_POST['post_desc'],
				'post_like' => '[]',
				'post_date' => date('d-m-Y H:i:s')
			);
			$chk=insert_data('forum_post', $args);
			
			if($chk) {
				$json['message']="Successfully Posted!";
				$json['success']=1;
				echo json_encode($json);
			}
			else echo err_json('Submission Failed!');
		}
		else echo err_json('Post Empty.');
//
	}
	else {
		echo err_json('Please login!');
	}
}
else {
	echo err_json('Wrong API Key.');
}
//
