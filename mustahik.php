<?php
require "function.php";

//HITUNG JUMLAH PESANAN
$h1 = mysqli_query($c, "select * from kategori_mustahik");
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
  <title>Mustahik</title>
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
          <a class="nav-link text-white" aria-current="page" href="index.php">MUZAKKI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light ms-2" aria-current="page" href="bayarzakat.php">BAYAR ZAKAT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bg-light text-dark" aria-current="page" href="mustahik.php">KATEGORI MUSTAHIK</a>
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
    <h2>KATEGORI MUSTAHIK</h2>


    <div class="card border-light mb-3 shadow-sm" style="max-width: 18rem;">
      <div class="card-header text-white mt-1" style="background-color:rgb(40, 40, 40);">Jumlah Kategori</div>
      <div class="card-body">
        <h5 class="card-title"><?= $h2; ?></h5>
      </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn text-white mt-2" style="background-color:rgb(40, 40, 40);" data-bs-toggle="modal" data-bs-target="#bukain">
      Tambah Kategori
    </button>



    <table class="table table-bordered table-striped mt-4">
      <thead>
        <tr>
          <th>ID Kategori</th>
          <th>Nama Kategori</th>
          <th>Jumlah Hak</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $get = mysqli_query($c, "select * from kategori_mustahik");

        while ($p = mysqli_fetch_array($get)) {
          $idkategori = $p['idkategori'];
          $nama_kategori = $p['nama_kategori'];
          $jumlah_hak = $p['jumlah_hak'];
        ?>

          <tr>
            <th class="fw-lighter"> <?= $idkategori; ?> </th>
            <th class="fw-lighter"> <?= $nama_kategori; ?> </th>
            <th class="fw-lighter"> <?= $jumlah_hak; ?> </th>
            <td>
              <a href="detailmus.php?idkategori=<?= $idkategori; ?>" class="btn btn-primary">Detail</a>
              <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit<?= $idkategori; ?>">
                Edit
              </button>
              <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#delete<?= $idkategori; ?>">
                Delete
              </button>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="edit<?= $idkategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit <?= $nama_kategori; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post">
                  <div class="modal-body">
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan Nama" value="<?= $nama_kategori; ?>" required>
                    <input type="number" name="jumlah_hak" class="form-control mt-2" placeholder="Jumlah Tanggungan" value="<?= $jumlah_hak; ?>" required>
                    <input type="hidden" name="idkategori" value="<?= $idkategori; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" name="editkategori">Edit Kategori</button>
                  </div>

                </form>

              </div>
            </div>
          </div>


          <!-- Modal Delete -->
          <div class="modal fade" id="delete<?= $idkategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete <?= $nama_kategori; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post">
                  <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="idkategori" value="<?= $idkategori; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" name="hapuskategori">Hapus Kategori</button>
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
<div class="modal fade" id="bukain" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Muzakki Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="post">
        <div class="modal-body">
          <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan Nama" required>
          <input type="number" name="jumlah_hak" class="form-control mt-2" placeholder="Jumlah Tanggungan" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="tambahkategori">Tambah Kategori</button>
        </div>

      </form>

    </div>
  </div>
</div>

</html>