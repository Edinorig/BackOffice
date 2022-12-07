<?php
require_once '../php/dbConnection.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `tabella` WHERE `tabella`.`id` = '$id'");

header('Location: ../index.php');