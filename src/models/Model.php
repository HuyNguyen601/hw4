<?php
namespace hw4\models;


class Model{

	public function updateSheet($name, $data)
	{
		$info = new \hw4\configs\config();
		$add = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($add->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query= $add->query("UPDATE sheet SET sheet_data='$data' WHERE sheet_name like '$name'");
		if(!$query || $add->affected_rows == 0)
		{
			$query =$add->query("INSERT INTO sheet (sheet_name,sheet_data) VALUES ('$name', '$data');");
		}
		$add->close();
	}

	public function updateCode($name,$code,$type)
	{
		$info = new \hw4\configs\config();
		$add = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($add->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query =$add->query("INSERT INTO sheet_codes VALUES ((SELECT sheet_id FROM sheet WHERE sheet_name LIKE '$name'),'$code','$type');");
		die($add->error);
		$add->close();
	}

	public function getSheet($name)
	{
		$info = new \hw4\configs\config();
		$get = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($get->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	SELECT sheet_data
					FROM sheet
					WHERE sheet_name
					LIKE '$name';";
		$result = $get->query($query);
		echo $get->error;
		$get->close();
		return $result;
	}

	public function getCode($name)
	{
		$info = new \hw4\configs\config();
		$get = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($get->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	SELECT sheet_name,code_type 
					FROM sheet,sheet_codes 
					WHERE sheet_codes.sheet_id = 
					(SELECT sheet_id 
					FROM sheet_codes 
					WHERE hash_code LIKE '$name')";

		$result = $get->query($query);
		echo $get->error;
		$get->close();
		return $result;
	}
	
	public function getNoteContent($name)
	{
		$info = new config();
		$get= new \mysqli($info->host,$info->user,$info->pass,$info->db);
		$query = "SELECT content FROM note WHERE name LIKE '$name';";
		$results = $get->query($query);
		$get->close();
		return $results;
	}
}
?>