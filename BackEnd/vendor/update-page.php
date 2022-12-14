<?php
require_once '../php/dbConnection.php';

$datatypeId = $_GET['id'];
$data = mysqli_query($connect, "SELECT * FROM `tabella` WHERE `id`='$datatypeId'");
$data = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-index.css">
    <title>Update data</title>
</head>

<body>


    <a style="margin-right: -55%;" href="./index.php">Main page</a>

    <div class="wrapper-form">

        <p class="tittle">Update data </p>
        <form class="input-data" action="./update.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="wrapper-div">
                <p class="title-data">Testo</p>
                <input type="text" placeholder="tetx" name="testo" value="<?= $data['testo'] ?>">
            </div>

            <div class="wrapper-div">
                <p class="title-data">Data</p>
                <input type="date" name="data" value="<?= $data['data'] ?>">
            </div>

            <div class="wrapper-div">
                <p class="title-data">Camposn</p>
                <input type="checkbox" name="camposn" placeholder="s/n" value="<?= $data['camposn'] ?>" <?php if ($data['camposn'] == 's') echo "checked='checked'"; ?>>

            </div>

            <div class="wrapper-div">
                <p class="title-data">Numero</p>
                <input type="number" name="numero" placeholder="numeri" value="<?= $data['numero'] ?>">

            </div>

            <div class="wrapper-div">
                <p class="title-data">Percorso</p>
                <input type="file" name="percorso" placeholder="file path" value="<?= $data['percorso'] ?>">
            </div>

            <div class="wrapper-div">

                <p class="title-data">IdSupporto</p>
                <?php
                $data_supporto = mysqli_query($connect, "SELECT * FROM `supporto`");
                $data_supporto = mysqli_fetch_all($data_supporto);

                ?>
                <select name="idSupporto" id="idSupporto">
                    <option>0</option>
                    <?php
                    foreach ($data_supporto as $data) { ?>
                        <option><?= $data[0] ?> <p><?= $data[1] ?></p>
                        </option>
                    <?php
                    }
                    ?>

                </select>

            </div>


            <div class="wrapper-div-1">
                <p class="title-data">IdRadioet</p>

                <?php
                $datas = mysqli_query($connect, "SELECT * FROM `radioet`");
                $datas = mysqli_fetch_all($datas);
                foreach ($datas as $data) {
                ?>
                    <div class="wrapper-radio">
                        <p class="small-data"><?= $data[1] ?></p>
                        <input type="radio" name="idRadioet" value="<?= $data[0] ?>">
                    </div>
                <?php
                }
                ?>

                <button type="submit">Update</button>
            </div>
        </form>
    </div>

</body>

</html>