<?php 

	/*
	php连接
	 */
	$redis = new Redis();
	if($redis->connect("localhost",6379)){
		echo "连接成功";
		echo $redis->ping();//连接成功+PONG
	}
//设置键值对
	var_dump($redis->set("key1","val1"));//bool(true)
	var_dump($redis->setnx("key1","val2"));//bool(false)
	var_dump($redis->setnx("keynx","val2"));//bool(true)
	var_dump($redis->setnx("num1",0));//bool(true)
//获取键对应的值
	var_dump($redis->get("key1"));//string(4) "val1"
//获取不存在的值
	var_dump($redis->get("noExists"));//bool(false)
//删除
	var_dump($redis->delete("key1"));//int(1)
//删除不存在的键返回0
	var_dump($redis->delete("noExists"));//int(0)
//查看键是否存在
	var_dump($redis->exists("key1"));//bool(false)
//增加数字键
	var_dump($redis->incr("num1"));//int(1)
//减少数字键
 	var_dump($redis->decr("num1"));//int(1)
 	var_dump($redis->decr("noexists"));//int(-1)
 //同时赋值多个键值对
 	$arr = array("a"=>"a","b"=>"b");
 	var_dump($redis->mset($arr));//bool(true)
 //同时获取多个键值对
 	$res = array("a","b");
 	var_dump($redis->mget($res));//array(2) { [0]=> string(1) "a" [1]=> string(1) "b" }
 //设置过期时间
 	var_dump($redis->set("temp1","v1",20));//bool(true)20秒
 	var_dump($redis->pttl("temp1"));//int(20000)默认是毫秒单位



 ?>