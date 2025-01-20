<?php
require "function.php";
//CARI TAHU 1
$get = mysqli_query($c, "SELECT * FROM mustahik_lainnya WHERE idkategori=10007;");

while ($p = mysqli_fetch_array($get)) {
    $hakwarga[] = $p['hakmt'];


    $jml1 = array_sum($hakwarga);
};

//CARI TAHU 2
$get1 = mysqli_query($c, "SELECT * FROM mustahik_lainnya WHERE idkategori=10008;");

while ($p = mysqli_fetch_array($get1)) {
    $hakwarga1[] = $p['hakmt'];


    $jml2 = array_sum($hakwarga1);
};
//CARI TAHU 3
$get2 = mysqli_query($c, "SELECT * FROM mustahik_lainnya WHERE idkategori=10009;");

while ($p = mysqli_fetch_array($get2)) {
    $hakwarga2[] = $p['hakmt'];


    $jml3 = array_sum($hakwarga2);
};
//CARI TAHU 4
$get3 = mysqli_query($c, "SELECT * FROM mustahik_lainnya WHERE idkategori=10010;");

while ($p = mysqli_fetch_array($get3)) {
    $hakwarga3[] = $p['hakmt'];
};


$jml4 = array_sum($hakwarga3);

//HITUNG JUMLAH MUZAKKI
$h1 = mysqli_query($c, "SELECT  * FROM mustahik_lainnya");
$h2 = mysqli_num_rows($h1); //jumlah muzakki
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
    <title>Laporan Mustahik</title>
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

        <h2>LAPORAN ZAKAT MUSTAHIK</h2>



        <a class="btn btn-primary" href="docmt.php" role="button">Download Pdf</a>


        <table class="table table-bordered table-striped mt-4">
            <thead>
                <th colspan="1">Mualaf - Hak Fakir 3 Kg</th>
                <th colspan="1">Fisabilillah - Hak Miskin 3 Kg</th>
                <th colspan="1">Al gharin - Hak Mampu 3 Kg</th>
                <th colspan="1">Dzur Riqab- Hak Mampu 3 Kg</th>
                <tr>
                    <td>Total Beras</td>
                    <td>Total Beras</td>
                    <td>Total Beras</td>
                    <td>Total Beras</td>
                </tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="fw-lighter"> <?= $jml1 ?> </th>
                    <th class="fw-lighter"> <?= $jml2; ?> </th>
                    <th class="fw-lighter"> <?= $jml3; ?> </th>
                    <th class="fw-lighter"> <?= $jml4; ?> </th>
                <tr>
                    <th class="fw-lighter" colspan="3"><b class="fw-bold">Jumlah Mustahik:</b> <?= number_format($h2); ?> Kepala Keluarga</th>
                </tr>
            </tbody>
        </table>

    </div>
    </div>
    </div>

</html>