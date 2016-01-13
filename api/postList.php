<?php
/**
 * CricBD post list API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json;');
//
if(isset($_POST['api_key'])) {
	$var = sql_data('forum_user',"api_key='".$_POST['api_key']."'");
	if($var){
		
//
			$chk=post_list();
			$uid=(int)$var['uid'];
			     
			if($chk) {
				$json['message']="Posts found!";
				$json['success']=1;
				$json['data']=json_decode($chk,true);
				$counter=count($json['data']);
				for($post=0;$post<$counter;$post++) {
					$arr=json_decode($json['data'][$post]['post_like']);
					$json['data'][$post]['post_like']=count($arr);
					
					if(in_array($uid, $arr))
					$json['data'][$post]['liked']=1;
					else
					$json['data'][$post]['liked']=0;
					$com=post_comment($json['data'][$post]['post_id']);
					$arr=json_decode($com,true);
					$len=count($arr);
					$json['data'][$post]['post_comment']=$len;
				}
				
				echo json_encode($json);
			}
			else echo err_json('No posts found!');
		}
		else echo err_json('Please login!');
//
}
else {
	echo err_json('Wrong API Key.');
}
//