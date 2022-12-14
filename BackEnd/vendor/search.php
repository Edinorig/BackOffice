<?php
require_once '../php/dbConnection.php';

session_start();

$inputSearch = $_POST['inputSearch'];
$_SESSION['inputSearch'] = $inputSearch;
header('Location: ../index.php');
?>
