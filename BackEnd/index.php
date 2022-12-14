<?php
require_once './php/dbConnection.php';
session_start();
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
  <div class="wrapper-serch">
    <form class="search-form" action="./vendor/search.php" method="post">
      <input class="search-input" type="text" name="inputSearch" placeholder="search" />

      <?php
      if ($_SESSION['inputSearch'] == "") {
      ?>
        <input class="search" type="submit" value="Search" />
      <?php
      } else {
      ?>
        <input class="refresh" type="submit" value="Refresh" />
      <?php
      }
      ?>
    </form>
  </div>
  <table id="style-11">
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
    if (!(isset($_SESSION['inputSearch']))) {
    ?>

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
          <td><a  class="cancel" href="./vendor/delete.php?id=<?= $data[0] ?>">Cancellare</a></td>
          <td><a class="modify" href="./vendor/update-page.php?id=<?= $data[0] ?>">Modificare</a></td>
        </tr>
      <?php
      }
      ?>
      <?php
    } else {

      $inputSearch = $_SESSION['inputSearch'];
      $result = mysqli_query($connect, "SELECT * FROM tabella where testo LIKE '%$inputSearch%'");

      $i = 0;
      while ($data = mysqli_fetch_array($result)) {

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
          <td><a class="cancel" href="./vendor/delete.php?id=<?= $data[0] ?>">Cancellare</a></td>
          <td><a class="modify" href="./vendor/update-page.php?id=<?= $data[0] ?>">Modificare</a></td>

        </tr>
    <?php
        $i++;
      }
    }
    ?>
  </table>
  <div class="wrapper-form">
    <p class="tittle">Aggiungere record</p>
    <form class="input-data" action="./vendor/create.php" method="post">
      <div class="wrapper-div">
        <p class="title-data">Testo</p>
        <input type="text" placeholder="tetx" name="testo" required>
      </div>

      <div class="wrapper-div">
        <p class="title-data">Data</p>
        <input type="date" name="data" required>
      </div>


      <div class="wrapper-div">
        <p class="title-data">Camposn</p>
        <input class="margin-checkbox" type="checkbox" name="camposn" placeholder="s/n" required>
      </div>


      <div class="wrapper-div">
        <p class="title-data">Numero</p>
        <input type="number" name="numero" placeholder="numeri" maxlength="10" required>
      </div>

      <div class="wrapper-div">
        <p class="title-data">Percorso</p>
        <input type="file" name="percorso" placeholder="file path" required>
      </div>


      <div class="wrapper-div">
        <p class="title-data">IdSupporto</p>

        <?php
        $data_supporto = mysqli_query($connect, "SELECT * FROM `supporto`");
        $data_supporto = mysqli_fetch_all($data_supporto);
        ?>

        <select name="idSupporto" id="idSupporto" required>
          <option>0</option>
          <?php
          foreach ($data_supporto as $data) { ?>
            <option><?= $data[0] ?> <p class="small-data"><?= $data[1] ?></p>
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
            <input type="radio" name="idRadioet" placeholder="radio mettere num" value="<?= $data[0] ?>" required>
          </div>
        <?php
        }
        ?>
      </div>
      <button class="create-btn" type="submit">Aggiungi</button>
    </form>
  </div>
</body>

</html>