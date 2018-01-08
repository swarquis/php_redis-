<?php 
	
	$redis = new Redis();
	if($redis->connect("localhost",6379)){
		echo "连接成功";
		echo $redis->ping();//连接成功+PONG
	}


	var_dump($redis->zadd("zset1",20,"a","x","b",40,"c",80,"d","abc","e"));//int(5)

	var_dump($redis->zscore("zset1","b"));//float(0)
	var_dump($redis->zscore("zset1","c"));//float(40)
	var_dump($redis->zrange("zset1",0,-1));//array(5) { [0]=> string(1) "b" [1]=> string(1) "e" [2]=> string(1) "a" [3]=> string(1) "c" [4]=> string(1) "d" }从小到大ascii码大小//zrevrange相反
	var_dump($redis->zrange("zset1",100,200));//array(0) { }超过元素个数返回空
	var_dump($redis->zrangebyscore("zset1",20,80));// array(3) { [0]=> string(1) "a" [1]=> string(1) "c" [2]=> string(1) "d" }从小到大数字比较--zrevrangebyscore
	var_dump($redis->zcard("zset1"));//int(5)总共元素个数
	var_dump($redis->zcount("zset1",0,180));//int(5)
	var_dump($redis->zrem("zset1","a"));//int(1)
	var_dump($redis->zrank("zset1","c"));//获得指定元素排名int(2)

 ?>