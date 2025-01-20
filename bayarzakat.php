<?php
require "ceklogin.php";

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
  <title>Bayar zakat</title>
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

    <h2>DATA PENGUMPULAN ZAKAT FITRAH</h2>


    <div class="card border-light mb-3 shadow-sm" style="max-width: 18rem;">
      <div class="card-header text-white mt-1" style="background-color:rgb(40, 40, 40);">Jumlah yang Sudah Bayar</div>
      <div class="card-body">
        <h5 class="card-title"><?= $h2; ?></h5>
      </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn text-white mt-2" style="background-color:rgb(40, 40, 40);" data-bs-toggle="modal" data-bs-target="#bukamodal">
      Pembayaran
    </button>

    <a class="btn btn-primary" href="laporanbayarzakat.php" role="button" target="blank">Laporan Bayar Zakat</a>


    <table class="table table-bordered table-striped mt-4">
      <thead>
        <tr>
          <th>ID Zakat</th>
          <th>Tanggal Bayar</th>
          <th>Nama Muzakki</th>
          <th>Jumlah Tanggungan</th>
          <th>Jenis Bayar</th>
          <th>Tanggungan Dibayar</th>
          <th>Jumlah Beras</th>
          <th>Jumlah Uang</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $get = mysqli_query($c, "select * from bayarzakat b, muzakki m where b.idmuzakki=m.idmuzakki");
        $i = 1;
        while ($p = mysqli_fetch_array($get)) {

          $idmuzakki = $p['idmuzakki'];
          $idzakat = $p['idzakat'];
          $tglbayar = $p['tglbayar'];
          $namamuzakki = $p['namamuzakki'];
          $jmltanggungan = $p['jmltanggungan'];
          $jenis_bayar = $p['jenis_bayar'];
          $jml_tanggungandibayar = $p['jml_tanggungandibayar'];
          $bayarberas = $p['bayarberas'];
          $bayaruang = $p['bayaruang'];
        ?>

          <tr>
            <th class="fw-lighter"> <?= $idzakat; ?> </th>
            <th class="fw-lighter"> <?= $tglbayar; ?> </th>
            <th class="fw-lighter"> <?= $namamuzakki; ?> </th>
            <th class="fw-lighter"> <?= $jmltanggungan; ?> </th>
            <th class="fw-lighter"> <?= $jenis_bayar; ?> </th>
            <th class="fw-lighter"> <?= $jml_tanggungandibayar; ?> </th>
            <th class="fw-lighter"> <?= number_format($bayarberas); ?> Kg </th>
            <th class="fw-lighter"> Rp. <?= number_format($bayaruang); ?> </th>
            <td>
              <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit<?= $idzakat; ?>">
                Edit
              </button>
              <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#delete<?= $idzakat; ?>">
                Delete
              </button>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="edit<?= $idzakat; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit <?= $namamuzakki; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post">
                  <div class="modal-body">
                    <input type="text" name="namamuzakki" class="form-control" placeholder="Masukan Nama" value="<?= $namamuzakki; ?> - <?= $jmltanggungan; ?>" disabled>
                    <select name="jenis_bayar" class="form-select mt-2" aria-label="Default select example" required>
                      <option selected><?= $jenis_bayar; ?></option>
                      <option value="Beras">Beras</option>
                      <option value="Uang">Uang</option>
                    </select>
                    <input type="number" name="jml_tanggungandibayar" class="form-control mt-2" placeholder="Jumlah Tanggungan yang Dibayar" value="<?= $jml_tanggungandibayar; ?>" min="1" required>
                    <input type="number" name="bayarberas" class="form-control mt-2" placeholder="Jumlah Beras" value="<?= $bayarberas; ?>">
                    <input type="num" name="bayaruang" class="form-control mt-2" placeholder="Jumlah Uang" value="<?= $bayaruang; ?>">
                    <input type="hidden" name="idzakat" value="<?= $idzakat; ?>">
                    <input type="hidden" name="idmuzakki" value="<?= $idmuzakki; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" name="editbayarzakat">Edit Muzakki</button>
                  </div>

                </form>

              </div>
            </div>
          </div>


          <!-- Modal Delete -->
          <div class="modal fade" id="delete<?= $idzakat; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete <?= $namamuzakki; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post">
                  <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="idmuzakki" value="<?= $idmuzakki; ?>">
                    <input type="hidden" name="idzakat" value="<?= $idzakat; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" name="hapusbayarzakat">Hapus Muzakki</button>
                  </div>

                </form>

              </div>
            </div>
          </div>

        <?php
        }; //end of while

        ?>

      </tbody>
    </table>


  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <br>
  <br>
</body>

<!-- Modal -->
<div class="modal fade" id="bukamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Muzakki Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="post">
        <div class="modal-body">


          <select name="idmuzakki" class="form-select" aria-label="Default select example" required>
            <option selected>Pilih Muzakki</option>

            <?php
            $getmuzakki = mysqli_query($c, "select * from muzakki where idmuzakki not in (select idmuzakki from mustahik_warga where idmuzakki is not null)");
            while ($m = mysqli_fetch_array($getmuzakki)) {
              $namamuzakki = $m['namamuzakki'];
              $idmuzakki = $m['idmuzakki'];
              $jmltanggungan = $m['jmltanggungan'];

            ?>

              <option value="<?= $idmuzakki; ?>"><?= $namamuzakki; ?> - Tanggungan: <?= $jmltanggungan; ?></option>

            <?php


            } //end of while
            ?>



          </select>

          <select name="jenis_bayar" class="form-select mt-2" aria-label="Default select example" required>
            <option selected>Jenis Zakat</option>
            <option value="Beras">Beras</option>
            <option value="Uang">Uang</option>
          </select>
          <input type="number" name="jml_tanggungandibayar" class="form-control mt-2" placeholder="Jumlah Tanggungan yang Dibayar" min="1" required>
          <input type="number" name="bayarberas" class="form-control mt-2" placeholder="Jumlah Beras">
          <input type="num" name="bayaruang" class="form-control mt-2" placeholder="Jumlah Uang">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="tambahbayarzakat">Tambah Pemabayaran</button>
        </div>

      </form>

    </div>
  </div>
</div>

</html>