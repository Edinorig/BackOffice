<?php
require_once '../php/dbConnection.php';


$id = $_POST['id'];
$testo = $_POST['testo'];
$data = $_POST['data'];
$camposn = $_POST['camposn'];


$numero = $_POST['numero'];
$percorso = $_POST['percorso'];
$idSupporto = $_POST['idSupporto'][0];
$idRadioet = $_POST['idRadioet'];

if(empty($idRadioet)){
    echo "\nRadioent is null\n";
    $idRadioet = "0";
    echo $idRadioet;
}

if(empty($camposn)){
    echo "\nCamposn is null\n";
    $camposn = "n";
    echo $camposn;
}else {
    echo "\nCamposn is not null\n";
    $camposn = "s";
    echo $camposn;
}



mysqli_query($connect, "UPDATE `tabella` SET `testo` = '$testo', `data` = '$data', `camposn` = '$camposn', `numero` = '$numero', `percorso` = '$percorso', `idSupporto` = '$idSupporto', `idRadioet` = '$idRadioet' WHERE `tabella`.`id` = '$id'") or die(mysqli_error($connect));

/* UPDATE tabella SET testo = 'vysotskyy', data = '2020-09-08', camposn = 's', numero = '23', percorso = 'path/', idSupporto = '2', idRadioet = '2' WHERE tabella.id = '13' */

header('Location: ../index.php');