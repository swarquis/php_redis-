<?php 

	$redis = new Redis();
	if($redis->connect("localhost",6379)){
		echo "连接成功";
		echo $redis->ping();//连接成功+PONG
	}
	//hmset 和hmget要用数组操作数据
	$arr = array("k1"=>"v1",
		"k2"=>"v2",
		"k3"=>"v3"

	);
	var_dump($redis->hmset("hset1",$arr));//bool(true)
	var_dump($redis->hmget("hset1",array("k1","k2")));//array(2) { ["k1"]=> string(2) "v1" ["k2"]=> string(2) "v2" }
	var_dump($redis->hlen("hset1"));//int(3)总元素个数
	var_dump($redis->hgetall("hset1"));//array(3) { ["k1"]=> string(2) "v1" ["k2"]=> string(2) "v2" ["k3"]=> string(2) "v3" }所有键值对
	var_dump($redis->hkeys("hset1"));//array(3) { [0]=> string(2) "k1" [1]=> string(2) "k2" [2]=> string(2) "k3" }只有键名--hvals
	var_dump($redis->hexists("hset1","k4"));//bool(false)

	var_dump($redis->hdel("hset1","k1","k2","k4"));//int(2)只删除存在的键

 ?>