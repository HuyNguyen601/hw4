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
		$query= "	UPDATE sheet 
					SET sheet_data='$data' 
					WHERE sheet_name like '$name';";
		$add->query($query);
		$add->close();
	}

	public function addSheet($name)
	{
		$info = new \hw4\configs\config();
		$add = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($add->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$query = "	INSERT INTO sheet (sheet_name,sheet_data)
					VALUES ('$name', '');";
		$add->query($query);
		$add->close();

	}

	public function addCode($name,$code,$type)
	{
		$info = new \hw4\configs\config();
		$add = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($add->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	INSERT INTO sheet_codes 
					VALUES ((	SELECT sheet_id 
								FROM sheet 
								WHERE sheet_name 
								LIKE '$name')
					,'$code','$type');";
		$add->query($query);
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

	//get name and code type with specific hash code
	public function getNameAndCode($name)
	{
		$info = new \hw4\configs\config();
		$get = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($get->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	SELECT sheet_name,code_type 
					FROM sheet,sheet_codes 
					WHERE sheet.sheet_id = 
						(SELECT sheet_id 
						FROM sheet_codes 
						WHERE hash_code LIKE '$name')
					AND hash_code LIKE '$name';";

		$result = $get->query($query);
		echo $get->error;
		$get->close();
		return $result;
	}

	//get hash code and code type based on name
	public function getCodes($name)
	{
		$info = new \hw4\configs\config();
		$get = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($get->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	SELECT hash_code,code_type 
					FROM sheet_codes 
					WHERE sheet_codes.sheet_id = 
						(SELECT sheet_id 
						FROM sheet 
						WHERE sheet_name LIKE '$name');";

		$result = $get->query($query);
		echo $get->error;
		$get->close();
		return $result;
	}

	//get name, file hash code, and data for read controller, $code as input
	public function readModel($code)
	{
		$info = new \hw4\configs\config();
		$get = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($get->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	SELECT sheet_name,sheet_data,hash_code
					FROM sheet,sheet_codes
					WHERE sheet.sheet_id = 
						(SELECT sheet_id 
						FROM sheet_codes
						WHERE hash_code LIKE '$code')
					AND code_type = 'file';";

		$result = $get->query($query);
		echo $get->error;
		$get->close();
		return $result;
	}

	public function getAll($code)
	{
		$info = new \hw4\configs\config();
		$get = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($get->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "	SELECT sheet.sheet_id, 
					sheet_name, sheet_data, hash_code, code_type
					FROM sheet,sheet_codes
					WHERE sheet.sheet_id =
						(SELECT sheet_id
						 FROM sheet_codes
						 WHERE hash_code LIKE '$code');";
		$result = $get->query($query);
		echo $get->error;
		$get->close();
		return $result;

	}

}