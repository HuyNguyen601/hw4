<?php
namespace Logan\hw3;
require_once dirname(__FILE__).'/configs/config.php';

class Model{

	public function addList($name, $parent)
	{
		$info = new config();
		$add = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($add->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "INSERT INTO list VALUES ('$name', '$parent');";
		$add->query($query);
		$add->close();
	}

	public function getList($parent)
	{
		$info = new config();
		$get= new \mysqli($info->host,$info->user,$info->pass,$info->db);
		$query = "	SELECT name 
				FROM list 
				WHERE parent LIKE '$parent' 
				ORDER BY name ASC;";
		$results = $get->query($query);
		$get->close();
		return $results;
	}

	public function addNote($name, $parent, $date, $content)
	{
		$info = new config();
		$add = new \mysqli($info->host,$info->user,$info->pass,$info->db);
		if($add->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
		$query = "INSERT INTO note
			VALUES ('$name', '$parent','$date','$content');";
		$add->query($query);
		echo $add->error;
		$add->close();
	}

	public function getNote($parent)
	{
		$info = new config();
		$get= new \mysqli($info->host,$info->user,$info->pass,$info->db);
		$query = "	SELECT name,time 
				FROM note 
				WHERE parent LIKE '$parent'
				ORDER BY time DESC;";
		$results = $get->query($query);
		$get->close();
		return $results;
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