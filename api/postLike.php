<?php
/**
 * CricBD post like API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_POST['api_key'])) {
	$var = sql_data('forum_user',"api_key='".$_POST['api_key']."'");
	if($var){
//			
		if(isset($_POST['post_id'])) {
			$postId=(int)$_POST['post_id'];
			$chk=single_post($postId);
			$uid=(int)$var['uid'];
			if($chk) {
				$json=array();
				$json['data']=json_decode($chk,true);
				$arr=json_decode($json['data'][0]['post_like']);
				
				if(in_array($uid, $arr))
				echo err_json('Already liked!');
				else {
					array_push($arr,$uid);
					$args=array(
						'post_like' => json_encode($arr)
					);
					$chk=update_data("forum_post",$args,"post_id='$postId'");
					if($chk)
					echo success_json('Posts liked!');
					else err_json('Like disabled!');
				}
			}
			else echo err_json('No posts found!');
		}
		else err_json('Post ID not found!');
	}
	else echo err_json('Please login!');
//
}
else {
	echo err_json('Wrong API Key.');
}
//