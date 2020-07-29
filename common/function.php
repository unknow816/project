<?php 


	function getdata($table){
		global $conn;
		$sql = "select * from ".$table;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
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

 ?>