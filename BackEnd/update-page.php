<?php
require_once './php/dbConnection.php';
$datatypeId = $_GET['id'];
$data = mysqli_query($connect, "SELECT * FROM `tabella` WHERE `id`='$datatypeId'");
$data = mysqli_fetch_assoc($data);
echo '<pre>';
print_r($data);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-index.css">
    <title>Update data</title>
</head>

<body>

    <hr>
    <a href="./index.php">Main page</a>

    <h2>Update data</h2>
    <form action="./vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <p>testo</p>
        <input type="text" placeholder="tetx" name="testo" value="<?= $data['testo'] ?>">
        <p>data</p>
        <input type="date" name="data" value="<?= $data['data'] ?>">
        <p>camposn</p>
        <input type="checkbox" name="camposn" placeholder="s/n" value="<?= $data['camposn'] ?>">
        <p>numero</p>
        <input type="number" name="numero" placeholder="numeri" value="<?= $data['numero'] ?>">
        <p>percorso</p>
        <input type="file" name="percorso" placeholder="file path" value="<?= $data['percorso'] ?>">
        <p>idSupporto</p>
        <select name="idSupporto" id="idSupporto">
            <?php
            foreach ($data_supporto as $data) { ?>
                <option><?= $data[1] ?></option>
            <?php
            }
            ?>
        </select>
        <p>idRadioet</p>
        <input type="radio" name="idRadioet" placeholder="radio mettere num" value="<?= $data['idRadioet'] ?>">
        <button type="submit">Update</button>
    </form>

</body>

</html>