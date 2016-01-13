<?php
/**
 * CricBD post view API for Apps
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
				$json['message']="Posts found!";
				$json['success']=1;
				$json['data']=json_decode($chk,true);
				$arr=json_decode($json['data'][0]['post_like']);
				
				if(in_array($uid, $arr))
				$json['data'][0]['liked']=1;
				else
				$json['data'][0]['liked']=0;
				
				$json['data'][0]['post_like']=count($arr);
				
				$com=post_comment($postId);
				$json['data'][0]['comments']=json_decode($com,true);
				$len=count($json['data'][0]['comments']);
				$json['data'][0]['total_comment']=$len;
				if($len==0){
					$json['data'][0]['comments']=array();
				}
				else
				for($i=0;$i<$len;$i++){
					$tmp=$json['data'][0]['comments'][$i]['comment_id'];
					$json['data'][0]['comments'][$i]['subcomment']=sub_comments($postId,$tmp);
					if($json['data'][0]['comments'][$i]['subcomment']==null)
					$json['data'][0]['comments'][$i]['subcomment']=array();
				}
				echo json_encode($json);
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