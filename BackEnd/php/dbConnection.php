<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "backoffice";



$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect) {
  die('Error');
}