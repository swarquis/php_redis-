<?php 

		$redis = new Redis();
		if($redis->connect("localhost",6379)){
			echo "连接成功";
			echo $redis->ping();//连接成功+PONG
		}
		$arr = array(
			"k1"=>"v1",
			"k2"=>"v2",
			"k3"=>"v3",
			"k4"=>10,
			"k5"=>30,
			"k6"=>77,
			"k7"=>90
		);
		$arr1 = array(
			"name_1"=>"n1",
			"name_2"=>"n2",
			"name_3"=>"n3",
			"name_4"=>"n4",
			"name_5"=>"n5",
			"name_6"=>"n6",
			"name_7"=>"n7"
			
		);
		$redis->mset($arr);
		$redis->mset($arr1);
		$res = array('k1','k2','k3','k4','k5','k6','k7');
		var_dump($redis->mget($res));//array(7) { [0]=> string(2) "v1" [1]=> string(2) "v2" [2]=> string(2) "v3" [3]=> string(2) "10" [4]=> string(2) "30" [5]=> string(2) "77" [6]=> string(2) "90" }
		var_dump($redis->sort("k1"));//bool(false)
		$sort = array(
			"alpha"=>true

			);
		$redis->lpush("list",1,2,3,4,5,6,7);
		
		
		var_dump($redis->sort("list"));//bool(false)
		var_dump($redis->sort("list",$sort));//array(7) { [0]=> string(1) "1" [1]=> string(1) "2" [2]=> string(1) "3" [3]=> string(1) "4" [4]=> string(1) "5" [5]=> string(1) "6" [6]=> string(1) "7" }
		$sort = array(
			"alpha"=>true,//允许对字母排序
			"by"=>"k*"//根据哪个键排列
		);
		var_dump($redis->sort("list",$sort));//array(7) { [0]=> string(1) "4" [1]=> string(1) "5" [2]=> string(1) "6" [3]=> string(1) "7" [4]=> string(1) "1" [5]=> string(1) "2" [6]=> string(1) "3" }
		$sort = array(
			"alpha"=>true,//允许对字母排序
			"by"=>"k*",//根据哪个键排列
			"get"=>"name_*"//指定要获得的键
		);
		var_dump($redis->sort("list",$sort));//array(7) { [0]=> string(2) "n4" [1]=> string(2) "n5" [2]=> string(2) "n6" [3]=> string(2) "n7" [4]=> string(2) "n1" [5]=> string(2) "n2" [6]=> string(2) "n3" }

		$sort = array(
			"alpha"=>true,//允许对字母排序
			"by"=>"k*",//根据哪个键排列
			"get"=>"name_*",//指定要获得的键
			"limit"=>array(0,1),//指定显示结果数目
			"sort"=>"desc"//指定排列顺序
		);
		var_dump($redis->sort("list",$sort));// array(1) { [0]=> string(2) "n3" }

 ?>