<?php
namespace hw4\configs;

class config {
	public $host;
	public $user;
	public $pass;
	public $db;
	public function __construct()
	{
		$this->host = "127.0.0.1";
		$this->user = "root";
		$this->pass = "Chlovethoiu23";
		$this->db = "homework4";
	}
}

