<?php 

/*
	php连接
	 */
	$redis = new Redis();
	if($redis->connect("localhost",6379)){
		echo "连接成功";
		echo $redis->ping();//连接成功+PONG
	}
	//lpush是最末尾的元素在最上面
	var_dump($redis->lpush("list","a","b","c"));//int(3)
	//rpush最末尾的在最下面
	var_dump($redis->rpush("list","b","c","d"));//int(6)此时list内共有六个元素
	//list下标从0开始
	var_dump($redis->lrange("list",0,-1));//array(6) { [0]=> string(1) "c" [1]=> string(1) "b" [2]=> string(1) "a" [3]=> string(1) "b" [4]=> string(1) "c" [5]=> string(1) "d" }
	//pop返回被弹出的元素
	var_dump($redis->lpop("list"));//string(1) "c"
	var_dump($redis->rpop("list"));//string(1) "d"
	var_dump($redis->lindex("list",1));//string(1) "a"
	var_dump($redis->lindex("list",20));//bool(false)
	var_dump($redis->lrem("list","b",2));//int(2)
	var_dump($redis->rpoplpush("list","listnew"));//string(1) "c"
	var_dump($redis->lrange("listnew",0,-1));//array(1) { [0]=> string(1) "c" }
	var_dump($redis->lpushx("listnew","b"));//int(2)只能一次添加一个



 ?>