<?php
require_once './php/dbConnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style-index.css">
  <title>Main</title>
</head>

<body>

  <table>

    <tr>
      <th>ID</th>
      <th>Test</th>
      <th>Data</th>
      <th>Camposn</th>
      <th>Numero</th>
      <th>Percorso</th>
      <th>IdSupporto</th>
      <th>IdRadioent</th>
    </tr>

    <?php
    $datas = mysqli_query($connect, "SELECT * FROM `tabella`");
    $datas = mysqli_fetch_all($datas);
    foreach ($datas as $data) {
    ?>
      <tr>
        <td><?= $data[0] ?></td>
        <td><?= $data[1] ?></td>
        <td><?= $data[2] ?></td>
        <td><?= $data[3] ?></td>
        <td><?= $data[4] ?></td>
        <td><?= $data[5] ?></td>
        <td><?= $data[6] ?></td>
        <td><?= $data[7] ?></td>
        <td><a href="./vendor/delete.php?id=<?= $data[0] ?>">Cancellare</a></td>
        <td><a href="./update-page.php?id=<?= $data[0] ?>">Modificare</a></td>
      </tr>
    <?php
    }
    ?>

  </table>

  <div class="wrapper-form">
    <h1>Aggiungere record</h1>
    <form action="./vendor/create.php" method="post">

      <p>testo</p>
      <input type="text" placeholder="tetx" name="testo" ">
      <p>data</p>
      <input type="date" name="data">
      <p>camposn</p>
      <input type="checkbox" name="camposn" placeholder="s/n">
      <p>numero</p>
      <input type="number" name="numero" placeholder="numeri">
      <p>percorso</p>
      <input type="file" name="percorso" placeholder="file path">


      <p>idSupporto</p>

      <?php
      $data_supporto = mysqli_query($connect, "SELECT * FROM `supporto`");
      $data_supporto = mysqli_fetch_all($data_supporto);

      /* print_r($data_supporto); */
      ?>

      <select name="idSupporto" id="idSupporto">
        <?php
        foreach ($data_supporto as $data) { ?>
          <option><?= $data[1] ?></option>
        <?php
        }
        ?>
      </select>


      <p>idRadioet</p>
      <?php
      $datas = mysqli_query($connect, "SELECT * FROM `radioet`");
      $datas = mysqli_fetch_all($datas);
      foreach ($datas as $data) {
      ?>
        <div class="wrapper-radio">
          <p><?= $data[1] ?></p>
          <input type="radio" name="idRadioet" placeholder="radio mettere num" value="<?= $data[1] ?>">
        </div>
      <?php
      }
      ?>

      <button type="submit">Aggiungi</button>
    </form>
  </div>
</body>

</html>