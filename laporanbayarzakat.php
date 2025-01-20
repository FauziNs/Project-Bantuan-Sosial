<?php
require "function.php";
$get = mysqli_query($c, "select * from bayarzakat");

while ($m = mysqli_fetch_array($get)) {
  $jml_tanggungandibayar[] = $m['jml_tanggungandibayar'];
  $bayarberas[] = $m['bayarberas'];
  $bayaruang[] = $m['bayaruang'];

  // keseluruhan jiwa
  $jmljiwa = array_sum($jml_tanggungandibayar);

  // keseluruhan beras
  $jmlberas = array_sum($bayarberas);

  // keseluruhan uang
  $jmluang = array_sum($bayaruang);
};

//HITUNG JUMLAH PESANAN
$h1 = mysqli_query($c, "select * from bayarzakat");
$h2 = mysqli_num_rows($h1); //jumlah pesanan
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
  <title>Laporan</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/avatar.svg" alt="Hello there!" width="40" height="40" class="d-inline-block me-2">
        ZAKAT
      </a>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">MUZAKKI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bg-light text-dark ms-2" aria-current="page" href="bayarzakat.php">BAYAR ZAKAT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="mustahik.php">KATEGORI MUSTAHIK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="mustahikwarga.php">DISTRIBUSI WARGA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="mustahiklainnya.php">DISTRIBUSI MUSTAHIK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php">Log out</a>
        </li>
      </ul>
  </nav>
  </div>


  <div class="container">
    <br>

    <h2>LAPORAN PENGUMPULAN ZAKAT FITRAH</h2>



    <a class="btn btn-primary" href="doc.php" role="button">Download Pdf</a>


    <table class="table table-bordered table-striped mt-4">
      <thead>
        <tr>
          <th>Total Muzakki</th>
          <th>Total Jiwa</th>
          <th>Total Beras</th>
          <th>Total Uang</th>

        </tr>
      </thead>
      <tbody>

        <tr>

          <th class="fw-lighter"> <?= $h2 ?> </th>
          <th class="fw-lighter"> <?= $jmljiwa; ?> </th>
          <th class="fw-lighter"> <?= $jmlberas; ?> </th>
          <th class="fw-lighter"> <?= $jmluang; ?> </th>
        </tr>

  </div>
  </div>
  </div>

</html>