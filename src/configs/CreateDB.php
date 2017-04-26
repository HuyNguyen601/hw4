<?php

namespace hw4\configs

using hw4\configs\config;

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
	sheet_id int IDENTITY(1,1) PRIMARY KEY,
	sheet_name VARCHAR(50),
	sheet_data VARCHAR(50)
	);";
$code ="CREATE TABLE SHEET_CODES (
	sheet_id int IDENTITY(1,1) PRIMARY KEY,
	hash_code VARCHAR(8),
	code_type VARCHAR(8)
	);";
if ($conn->query($sheet) === TRUE) { 
	echo "Sheet table created successfully\n";
	}
if ($conn->query($code) === TRUE) { 
	echo "Sheet_codes table created successfully\n";
	}
$conn->close();
?>
