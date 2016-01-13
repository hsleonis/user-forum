<?php
/**
 * CricBD comment API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_POST['api_key'])) {
	$var = sql_data('forum_user',"api_key='".$_POST['api_key']."'");
	if($var){
		
		if(isset($_POST['post_id'])) {
		
			if(isset($_POST['comment_desc']) && $_POST['comment_desc']!=""){
	//			
				date_default_timezone_set('Asia/Dhaka');
				$json=array();
				$args=array(
					'post_id' => $_POST['post_id'],
					'uid' => $var['uid'],
					'comment_desc' => $_POST['comment_desc'],
					'comment_root' => isset($_POST['comment_root'])?$_POST['comment_root']:0,
					'comment_date' => date('d-m-Y H:i:s')
				);
				$chk=insert_data('forum_comment', $args);
				
				if($chk) {
					$json['message']="Successfully Commented!";
					$json['success']=1;
					echo json_encode($json);
				}
				else echo err_json('Commenting Failed!');
			}
			else echo err_json('Comment Empty.');
		}
		else  echo err_json('Post not found!');
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
