<?php 

	$redis = new Redis();
	if($redis->connect("localhost",6379)){
		echo "连接成功";
		echo $redis->ping();//连接成功+PONG
	}


	if($redis->exists("key1")){

		$times = $redis->incr("key1");
		if($times>10){
			echo "退出操作";
		}
	}else{
		$redis->multi();
		echo "初始化...";
		$redis->incr("key1");
		$redis->expire("key1",10);
		$redis->exec();
	}



 ?>