<?php

session_start(); 

//Membuat koneksi
$c = mysqli_connect('localhost', 'root','', 'bansos');

//Login
if(isset($_POST['login'])){
    //initiate variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($c, "SELECT * FROM user WHERE username='$username' and password='$password' ");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //Jika data ditemukan
        //berhasil login

        $_SESSION['login'] = 'True';
        header('location:index.php');

    }else{
        //Data tidak ditemukan
        //Gagal login
        echo '
        <script>alert("Username/password salah");
        window.location.href="Login.php"
        </script>
        ';
    }
}

//Tambah Muzakki
if(isset($_POST['muzakki'])){
    $namamuzakki = $_POST['namamuzakki'];
    $jmltanggungan = $_POST['jmltanggungan'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($c,"insert into muzakki (namamuzakki, jmltanggungan, keterangan) values('$namamuzakki', '$jmltanggungan', '$keterangan')");

    if($insert){
        header('location:index.php');
    } else {
        echo '
        <script>alert("Gagal menambah muzakki baru");
        window.location.href="index.php"
        </script>
        ';
    }
}


//Edit Muzakki
if(isset($_POST['editmuzakki'])){
    $namamuzakki = $_POST['namamuzakki'];
    $jmltanggungan = $_POST['jmltanggungan'];
    $keterangan = $_POST['keterangan'];
    $idmuzakki = $_POST['idmuzakki'];

    $query = mysqli_query($c,"update muzakki set namamuzakki='$namamuzakki', jmltanggungan='$jmltanggungan', keterangan='$keterangan' where idmuzakki='$idmuzakki' ");

    if($query){
        header('location:index.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="index.php"
        </script>
        ';
    }
}


//Delete muzakki
if(isset($_POST['hapusmuzakki'])){
    $idmuzakki = $_POST['idmuzakki'];

    $query = mysqli_query($c,"delete from muzakki where idmuzakki='$idmuzakki'");

    if($query){
        header('location:index.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="index.php"
        </script>
        ';
    }
}


//Tambah Kategori
if(isset($_POST['tambahkategori'])){
    $nama_kategori = $_POST['nama_kategori'];
    $jumlah_hak = $_POST['jumlah_hak'];

    $insert = mysqli_query($c,"insert into kategori_mustahik (nama_kategori, jumlah_hak) values('$nama_kategori', '$jumlah_hak')");

    if($insert){
        header('location:mustahik.php');
    } else {
        echo '
        <script>alert("Gagal menambah mustahik baru");
        window.location.href="mustahik.php"
        </script>
        ';
    }
}


//Edit Mustahik
if(isset($_POST['editkategori'])){
    $nama_kategori = $_POST['nama_kategori'];
    $jumlah_hak = $_POST['jumlah_hak'];
    $idkategori = $_POST['idkategori'];

    $query = mysqli_query($c,"update kategori_mustahik set nama_kategori='$nama_kategori', jumlah_hak='$jumlah_hak' where idkategori='$idkategori' ");

    if($query){
        header('location:mustahik.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="mustahik.php"
        </script>
        ';
    }
}


//Delete mustahik
if(isset($_POST['hapuskategori'])){
    $idkategori = $_POST['idkategori'];

    $query = mysqli_query($c,"delete from kategori_mustahik where idkategori='$idkategori'");

    if($query){
        header('location:mustahik.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="mustahik.php"
        </script>
        ';
    }
}

//Tambah Pembayaran Zakat
if(isset($_POST['tambahbayarzakata'])){
    $idmuzakki = $_POST['idmuzakki'];
    $jenis_bayar = $_POST['jenis_bayar'];
    $jml_tanggungandibayar = $_POST['jml_tanggungandibayar'];
    $bayarberas = $_POST['bayarberas'];
    $bayaruang = $_POST['bayaruang'];

    
    $insert = mysqli_query($c,"insert into bayarzakat (idmuzakki, jenis_bayar, jml_tanggungandibayar, bayarberas, bayaruang) values('$idmuzakki', '$jenis_bayar', '$jml_tanggungandibayar', '$bayarberas', '$bayaruang')");

    if($insert){
        header('location:bayarzakat.php');
    } else {
        echo '
        <script>alert("Gagal menambah pembayaran zakat");
        window.location.href="bayarzakat.php"
        </script>
        ';
    }
}


//TAMBAH PEMBAYARAN ZAKAT
if(isset($_POST['tambahbayarzakat'])){
    $idmuzakki = $_POST['idmuzakki'];
    $jenis_bayar = $_POST['jenis_bayar'];
    $jml_tanggungandibayar = $_POST['jml_tanggungandibayar'];
    $bayarberas = $_POST['bayarberas'];
    $bayaruang = $_POST['bayaruang'];

    //hitung stock awal
    $hitung1 = mysqli_query($c, "select * from muzakki where idmuzakki='$idmuzakki' ");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['jmltanggungan']; //stock barang awal

    //hitung stock awal
    $hitung11 = mysqli_query($c, "select * from bayarzakat where idmuzakki='$idmuzakki' ");
    $hitung22 = mysqli_fetch_array($hitung11);
    $stocksekarang1 = $hitung22['idmuzakki']; //stock barang awal
    
    if($stocksekarang>=$jml_tanggungandibayar AND $stocksekarang1!=$idmuzakki){


    //stock cukup
    $insert = mysqli_query($c,"insert into bayarzakat (idmuzakki, jenis_bayar, jml_tanggungandibayar, bayarberas, bayaruang) values('$idmuzakki', '$jenis_bayar', '$jml_tanggungandibayar', '$bayarberas', '$bayaruang')");

    if($insert){
        header('location:bayarzakat.php');
    } else {
        echo '
        <script>alert("Gagal menambah produk baru");
        window.location.href="bayarzakat.php"
        </script>
        ';
    }

    } else {
        //stock kurang
        echo '
        <script>alert("Gagal! Muzakki tersebut sudah membayar atau tanggungan yang dibayar melebihi tanggungan sekarang");
        window.location.href="bayarzakat.php"
        </script>
        ';
    }
}


//Edit Pembayaran Zakat
if(isset($_POST['editbayarzakat'])){
    $idmuzakki = $_POST['idmuzakki'];
    $idzakat = $_POST['idzakat'];
    $jenis_bayar = $_POST['jenis_bayar'];
    $jml_tanggungandibayar = $_POST['jml_tanggungandibayar'];
    $bayarberas = $_POST['bayarberas'];
    $bayaruang = $_POST['bayaruang'];

    //hitung stock awal
    $hitung1 = mysqli_query($c, "select * from muzakki where idmuzakki='$idmuzakki' ");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['jmltanggungan']; //stock barang awal
    
    if($stocksekarang>=$jml_tanggungandibayar){


    //stock cukup
    $query = mysqli_query($c,"update bayarzakat set jenis_bayar='$jenis_bayar', jml_tanggungandibayar='$jml_tanggungandibayar', bayarberas='$bayarberas', bayaruang='$bayaruang' where idzakat='$idzakat' ");

    if($query){
        header('location:bayarzakat.php');
    } else {
        echo '
        <script>alert("Gagal menambah produk baru");
        window.location.href="bayarzakat.php"
        </script>
        ';
    }

    } else {
        //stock kurang
        echo '
        <script>alert("Gagal! Tanggungan yang dibayar melebihi tanggungan sekarang");
        window.location.href="bayarzakat.php"
        </script>
        ';
    }
}


//Delete pembayaran zakat
if(isset($_POST['hapusbayarzakat'])){
    $idmuzakki = $_POST['idmuzakki'];
    $idzakat = $_POST['idzakat'];

    $query = mysqli_query($c,"delete from bayarzakat where idzakat='$idzakat'");

    if($query){
        header('location:bayarzakat.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="bayarzakat.php"
        </script>
        ';
    }
}


//Tambah Mustahik warga
if(isset($_POST['tambahkan'])){
    $idmuzakki = $_POST['idmuzakki'];
    $idktwarga = $_POST['idktwarga'];

    //Cari Nama Muzakki
    $caritahu1 = mysqli_query($c, "select * from muzakki where idmuzakki='$idmuzakki'");
    $caritahu22 = mysqli_fetch_array($caritahu1);
    $sekarangtahu1 = $caritahu22['namamuzakki'];

    //Cari Kategori
    $caritahu11 = mysqli_query($c, "select * from kategori_warga where idktwarga='$idktwarga'");
    $caritahu22 = mysqli_fetch_array($caritahu11);
    $sekarangtahu11 = $caritahu22['namaktmst'];

    //Cari Jumlah Hak
    $caritahu = mysqli_query($c, "select * from kategori_warga where idktwarga='$idktwarga'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $sekarangtahu = $caritahu2['jmlhak_ktmst'];

    $insert = mysqli_query($c,"insert into mustahik_warga (idktwarga, idmuzakki, namawarga, kategoriwarga, hakwarga) values('$idktwarga','$idmuzakki' ,'$sekarangtahu1', '$sekarangtahu11', '$sekarangtahu')");

    if($insert){
        header('location:mustahikwarga.php');
    } else {
        echo '
        <script>alert("Gagal menambah muzakki baru");
        window.location.href="mustahikwarga.php"
        </script>
        ';
    }
}


//Edit Mustahik warga
if(isset($_POST['editah'])){
    $idmuzakki = $_POST['idmuzakki'];
    $idktwarga = $_POST['idktwarga'];
    $idmustahikwarga = $_POST['idmustahikwarga'];

    //Cari Kategori
    $caritahu11 = mysqli_query($c, "select * from kategori_warga where idktwarga='$idktwarga'");
    $caritahu22 = mysqli_fetch_array($caritahu11);
    $sekarangtahu11 = $caritahu22['namaktmst'];

    //Cari Jumlah Hak
    $caritahu = mysqli_query($c, "select * from kategori_warga where idktwarga='$idktwarga'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $sekarangtahu = $caritahu2['jmlhak_ktmst'];

    $query = mysqli_query($c,"update mustahik_warga set idktwarga='$idktwarga', idmuzakki='$idmuzakki', kategoriwarga='$sekarangtahu11', hakwarga='$sekarangtahu' where idmustahikwarga='$idmustahikwarga' ");

    if($query){
        header('location:mustahikwarga.php');
    } else {
        echo '
        <script>alert("Gagal menambah muzakki baru");
        window.location.href="mustahikwarga.php"
        </script>
        ';
    }
}

//Delete Mustahik Warga
if(isset($_POST['hapusah'])){
    $idmustahikwarga = $_POST['idmustahikwarga'];

    $query = mysqli_query($c,"delete from mustahik_warga where idmustahikwarga='$idmustahikwarga'");

    if($query){
        header('location:mustahikwarga.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="mustahikwarga.php"
        </script>
        ';
    }
}


//Tambah Mustahik Lainnya
if(isset($_POST['tambahkanah'])){
    $idkategori = $_POST['idkategori'];
    $namamt = $_POST['namamt'];

    //Cari Kategori
    $caritahu11 = mysqli_query($c, "select * from kategori_mustahik where idkategori='$idkategori'");
    $caritahu22 = mysqli_fetch_array($caritahu11);
    $sekarangtahu11 = $caritahu22['nama_kategori'];

    //Cari Jumlah Hak
    $caritahu = mysqli_query($c, "select * from kategori_mustahik where idkategori='$idkategori'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $sekarangtahu = $caritahu2['jumlah_hak'];

    $insert = mysqli_query($c,"insert into mustahik_lainnya (idkategori, namamt, kategorimt, hakmt) values('$idkategori' ,'$namamt', '$sekarangtahu11', '$sekarangtahu')");

    if($insert){
        header('location:mustahiklainnya.php');
    } else {
        echo '
        <script>alert("Gagal menambah muzakki baru");
        window.location.href="mustahiklainnya.php"
        </script>
        ';
    }
}

//Edit Mustahik Lainnya
if(isset($_POST['editinah'])){
    $idkategori = $_POST['idkategori'];
    $idmustahiklainnya = $_POST['idmustahiklainnya'];
    $namamt = $_POST['namamt'];

    //Cari Kategori
    $caritahu11 = mysqli_query($c, "select * from kategori_mustahik where idkategori='$idkategori'");
    $caritahu22 = mysqli_fetch_array($caritahu11);
    $sekarangtahu11 = $caritahu22['nama_kategori'];

    //Cari Jumlah Hak
    $caritahu = mysqli_query($c, "select * from kategori_mustahik where idkategori='$idkategori'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $sekarangtahu = $caritahu2['jumlah_hak'];

    $insert = mysqli_query($c,"update mustahik_lainnya set idkategori='$idkategori', namamt='$namamt', kategorimt='$sekarangtahu11', hakmt='$sekarangtahu' where idmustahiklainnya='$idmustahiklainnya'");

    if($insert){
        header('location:mustahiklainnya.php');
    } else {
        echo '
        <script>alert("Gagal menambah muzakki baru");
        window.location.href="mustahiklainnya.php"
        </script>
        ';
    }
}

//Delete Mustahik Warga
if(isset($_POST['hapusinah'])){
    $idmustahiklainnya = $_POST['idmustahiklainnya'];

    $query = mysqli_query($c,"delete from mustahik_lainnya where idmustahiklainnya='$idmustahiklainnya'");

    if($query){
        header('location:mustahiklainnya.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="mustahiklainnya.php"
        </script>
        ';
    }
}
?>