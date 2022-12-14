<?php
require_once '../php/dbConnection.php';

session_start();



echo '<pre>';

print_r($_POST);

echo '</pre>';

/* $id = $_POST['id']; */



echo '<pre>';
$testo = $_POST['testo'];
$numero = $_POST['numero'];

$data = $_POST['data'];
$idRadioet = $_POST['idRadioet'];
$camposn = $_POST['camposn'];

if (empty($camposn)) {
    echo "\nCamposn is null\n";
    $camposn = "n";
    echo $camposn;
} else {
    echo "\nCamposn is not null\n";
    $camposn = "s";
    echo $camposn;
}




if (empty($idRadioet)) {
    echo "\nRadioent is null\n";
    $idRadioet = "0";
    echo $idRadioet;
}

if (empty($numero)) {
    echo "\nNumero is null\n";
    $numero = "0";
    echo $numero;
}


    $data = $_POST['data'];

echo '</pre>';

$percorso = $_POST['percorso'];
$idSupporto = $_POST['idSupporto'][0];

$_SESSION['idSupporto'] = $idSupporto;
$_SESSION['idRadioet'] = $idRadioet;




mysqli_query($connect, "INSERT INTO `tabella` (`id`, `testo`, `data`, `camposn`, `numero`, `percorso`, `idSupporto`, `idRadioet`) VALUES (NULL, '$testo', '$data','$camposn', '$numero', '$percorso', '$idSupporto', '$idRadioet')") or die(mysqli_error($connect));
/* mysqli_query($connect, "INSERT INTO 'tabella' ('id','testo', 'data', 'camposn', 'numero', 'percorso', 'idSupporto', 'idRadioet') VALUES (NULL, 'densy', '2020-9-09','s', '23', 'ddd','2', '2')"); */

//INSERT INTO tabella (id,testo, data, camposn, numero, percorso, idSupporto, idRadioet) VALUES (NULL, 'densy', '2020-9-09','s', '23', 'ddd','2', '2')
header('Location: ../index.php');