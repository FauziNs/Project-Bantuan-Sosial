<?php
require "function.php";

if (isset($_GET['idmuzakki'])) {
  $idmuzakki = $_GET['idmuzakki'];

  $ambilnamamuzakki = mysqli_query($c, "select * from muzakki where idmuzakki='$idmuzakki'");
  $np = mysqli_fetch_array($ambilnamamuzakki);
  $namamuz = $np['namamuzakki'];

  $ambiljt = mysqli_query($c, "select * from muzakki where idmuzakki='$idmuzakki'");
  $jt = mysqli_fetch_array($ambiljt);
  $jmltanggungan = $jt['jmltanggungan'];

  $ambilket = mysqli_query($c, "select * from muzakki where idmuzakki='$idmuzakki'");
  $ket = mysqli_fetch_array($ambilket);
  $keterangan = $ket['keterangan'];
} else {
  header('location:index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <title>Detail muzakki</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/avatar.svg" alt="Hello there!" width="40" height="40" class="d-inline-block me-2">
        Bootstrap
      </a>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active bg-light text-dark" aria-current="page">MUZAKKI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page">KATEGORI MUSTAHIK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php">Log out</a>
        </li>
      </ul>
  </nav>
  </div>


  <div class="container">
    <br>

    <h2>ID MUZAKKI: <?= $idmuzakki; ?></h2>




    <div class="container">
      <div class="row d-flex">
        <div class="mt-2">
          <div class="row z-depth-3">
            <div class="col-sm-4 rounded-left" style="background-color:rgb(40, 40, 40);">
              <div class="card-block text-center text-white">
                <br>
                <br>
                <img src="img/avatar.svg" alt="Hello there!" width="150" height="150">
                <h2 class="font-weight-bold mt-4">Master Data</h2>
                <p>Muzakki</p><i class="far fa-edit fa-2x mb-4"></i>
              </div>
            </div>
            <div class="col-sm-8 bg-white rounded-right">
              <h3 class="mt-3 text-center">Data Muzakki</h3>
              <hr style="background-color:rgb(40, 40, 40);">
              <div class="row">
                <div class="col-sm-6">
                  <p class="font-weight-bold">ID Muzakki:</p>
                  <h6 class=" text-muted"><?= $idmuzakki; ?></h6>
                </div>
                <div class="col-sm-6">
                  <p class="font-weight-bold">Nama Muzakki:</p>
                  <h6 class="text-muted"><?= $namamuz; ?></h6>
                </div>
              </div>
              <hr style="background-color:rgb(40, 40, 40);">
              <div class="row">
                <div class="col-sm-6">
                  <p class="font-weight-bold">Jumlah Tanggungan:</p>
                  <h6 class="text-muted"><?= $jmltanggungan; ?></h6>
                </div>
                <div class="col-sm-6">
                  <p class="font-weight-bold">Keterangan:</p>
                  <h6 class="text-muted"> <?= $keterangan; ?> </h6>
                </div>
              </div>
              <hr style="background-color:rgb(40, 40, 40);">
              <a class="btn btn-primary px-3" href="index.php" role="button">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</form>

</div>
</div>
</div>

</html>