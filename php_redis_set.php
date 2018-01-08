<?php 

$redis = new Redis();
	if($redis->connect("localhost",6379)){
		echo "连接成功";
		echo $redis->ping();//连接成功+PONG
	}


var_dump($redis->sadd("set1","m1","m2","m3","m4","m5"));//int(5)
//添加重复的元素不会成功
var_dump($redis->smembers("set1"));//array(5) { [0]=> string(2) "m4" [1]=> string(2) "m3" [2]=> string(2) "m1" [3]=> string(2) "m2" [4]=> string(2) "m5" "m2" }
var_dump($redis->sismember("set1","m1"));//bool(true)
var_dump($redis->sismember("set1","m0"));//bool(false)
var_dump($redis->srem("set1","m1"));// int(1)
var_dump($redis->srem("set1","m1"));// int(0)不能重复删除
//var_dump($redis->spop("set1"));//string(2) "m3",删除返回随机元素
var_dump($redis->srandmember("set1"));//返回一个随机元素
var_dump($redis->srandmember("set1",2));//随机2个元素的数组
var_dump($redis->srandmember("set1",-3));//随机可重复的数组
$redis->sadd("set2","m3","m4","m5","m6","m7");
var_dump($redis->sdiffstore("sdiffstore","set1","set2"));//int(1)
var_dump($redis->sinterstore("sinterstore","set1","set2"));//int(3)
var_dump($redis->sunionstore("sunionstore","set1","set2"));//int(6)
var_dump($redis->scard("set1"));//int(4)得到集合元素个数
var_dump($redis->smove("set1","set2","m4"));//bool(true)

 ?>