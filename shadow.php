<?php
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1') {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db='flutter';
}else{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db='flutter';
}
try {
    $esdy_in= new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $esdy_in->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>