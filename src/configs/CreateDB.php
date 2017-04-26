<?php
require_once 'config.php';

$info = new config();
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
	sheet_name VARCHAR(50),
	sheet_data VARCHAR(50),
	PRIMARY KEY(sheet_id)
	);";
$code ="CREATE TABLE SHEET_CODES (
	sheet_id INT NOT NULL AUTO_INCREMENT,
	hash_code VARCHAR(8),
	code_type VARCHAR(8),
	PRIMARY KEY(sheet_id)
	);";
if ($conn->query($sheet) === TRUE) { 
	echo "Sheet table created successfully\n";
	}
if ($conn->query($code) === TRUE) { 
	echo "Sheet_codes table created successfully\n";
	}
$conn->close();
?>
