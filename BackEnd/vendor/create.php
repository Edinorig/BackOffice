<?php
require_once '../php/dbConnection.php';


echo '<pre>';

print_r($_POST);
echo '</pre>';

/* $id = $_POST['id']; */
$testo = $_POST['testo'];
$data = $_POST['data'];
$camposn = $_POST['camposn'];
$camposn = "1";
$numero = $_POST['numero'];
$percorso = $_POST['percorso'];
$idSupporto = $_POST['idSupporto'];
$idSupporto = "1";
$idRadioet = $_POST['idRadioet'];
$idRadioet = "1";


mysqli_query($connect, "INSERT INTO `tabella` (`id`, `testo`, `data`, `camposn`, `numero`, `percorso`, `idSupporto`, `idRadioet`) VALUES (NULL, '$testo', '$data','$camposn', '$numero', '$percorso', '$idSupporto', '$idRadioet')") or die(mysqli_error($connect));
/* mysqli_query($connect, "INSERT INTO 'tabella' ('id','testo', 'data', 'camposn', 'numero', 'percorso', 'idSupporto', 'idRadioet') VALUES (NULL, 'densy', '2020-9-09','s', '23', 'ddd','2', '2')"); */

//INSERT INTO tabella (id,testo, data, camposn, numero, percorso, idSupporto, idRadioet) VALUES (NULL, 'densy', '2020-9-09','s', '23', 'ddd','2', '2')
/* header('Location: ../index.php'); */