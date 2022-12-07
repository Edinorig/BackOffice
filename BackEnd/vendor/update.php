<?php
require_once '../php/dbConnection.php';


$id = $_POST['id'];
$testo = $_POST['testo'];
$data = $_POST['data'];
$camposn = $_POST['camposn'];
$numero = $_POST['numero'];
$percorso = $_POST['percorso'];
$idSupporto = $_POST['idSupporto'];
$idRadioet = $_POST['idRadioet'];

mysqli_query($connect, "UPDATE `tabella` SET `testo` = '$testo', `data` = '$data', `camposn` = '$camposn', `numero` = '$numero', `percorso` = '$percorso', `idSupporto` = '$idSupporto', `idRadioet` = '$idRadioet' WHERE `tabella`.`id` = '$id'");

/* UPDATE tabella SET testo = 'vysotskyy', data = '2020-09-08', camposn = 's', numero = '23', percorso = 'path/', idSupporto = '2', idRadioet = '2' WHERE tabella.id = '13' */

header('Location: ../index.php');