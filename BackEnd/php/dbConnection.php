<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'backoffice');
if(!$connect) {
  die('Error');
}