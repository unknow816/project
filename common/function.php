<?php 


	function getdata($table){
		global $conn;
		$sql = "select * from ".$table;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}


	function getdata_by_id($id,$table){
		global $conn;
		$sql = "select * from ".$table." where id=$id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
	}
	

	function getname($id,$table){
		global $conn;
		$sql = "select * from ".$table." where id=".$id;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$name = $stmt->fetch();

		return $name['name'];
	}

	function setdate($created_at){
		$date = date_create($created_at);
		echo date_format($date,"m/d/Y");;
	}

	function check($table,$col,$value){
		global $conn;
		$sql = "select * from ".$table." where ".$col." = '".$value."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
	}

	function countdata($table,$col,$value){
		global $conn;
		$sql = "select count(id) from ".$table." where ".$col." = '".$value."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$brand = $stmt->fetch();
		return $brand['count(id)'];

	}

	function limitdata($table,$star,$length){
		global $conn;
		$sql = "select * from ". $table . " order by id desc limit ".$star.",".$length;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getdatadesc($table,$id,$col){
		global $conn;
		$sql = "select * from ".$table." where pro_id = $id order by ".$col." desc";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

 ?>