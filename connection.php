<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sok_project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
