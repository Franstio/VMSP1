<?php
/***
# How to Send Submissions to Your MySQL Database Using PHP
MySQL PHP Save Example (v2.0)
Jotform Inc. 2022 - AP#0031

This script was built for the following sample form: https://www.jotform.com/222744188444461
For more information, see: https://www.jotform.com/help/?p=608327
***/



/***
Display the data keys and values for debugging purposes.
***/
echo '<pre>', print_r($_POST, 1) , '</pre>';



/***
Test the data if it's a valid submission by checking the submission ID.
***/
if (!isset($_POST['submission_id'])) {
	die("Invalid submission data!");
}



/***
## Database Config

NOTE: 
Replace the values below with your MYSQL database environment variables 
to create a valid connection.
***/
$serverName="localhost";
$uid ="sa";
$pwd="Batam2021";


$connectionInfo = array(	"UID"=>$uid,
							"PWD"=>$pwd,
							"Database"=>"VMSP1",
							"characterSet"=>"UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);

	if($conn){

		echo "koneksi berhasil";

	}else{

		echo "koneksi gagal";
		die( print_r( sqlsrv_errors(), true));
	}

