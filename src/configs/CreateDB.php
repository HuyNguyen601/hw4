<?php
require_once 'config.php';
$info = new hw4\configs\config();
$conn = new mysqli($info->host,$info->user,$info->pass);
if($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 

$create = "CREATE DATABASE homework4";
if ($conn->query($create) === TRUE) { 
	echo "Database created successfully\n";
} else {
   	 echo "Error creating database: " . $conn->error;
	}
$conn->select_db("homework4");
$sheet= "CREATE TABLE SHEET (
	sheet_id INT NOT NULL AUTO_INCREMENT,
	sheet_name VARCHAR(50) NOT NULL,
	sheet_data TEXT,
	CONSTRAINT AK_sheet_name UNIQUE(sheet_name),
	PRIMARY KEY(sheet_id)
	);";
$code ="CREATE TABLE SHEET_CODES (
	sheet_id INT NOT NULL,
	hash_code VARCHAR(8) NOT NULL,
	code_type VARCHAR(8) NOT NULL,
	PRIMARY KEY(hash_code)
	);";
if ($conn->query($sheet) === TRUE) { 
	echo "Sheet table created successfully\n";
	}
if ($conn->query($code) === TRUE) { 
	echo "Sheet_codes table created successfully\n";
	}
$conn->close();
?>
