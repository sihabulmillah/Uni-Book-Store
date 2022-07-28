<?php
include '../Controller/function.php';

//menampilkan data buku
$buku = readData("SELECT buku.*, penerbit.nama FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit");

//menampilkan data penerbit
$penerbit = readData("SELECT * FROM penerbit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uni Book Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body style="font-family: poppins;">
  <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand text-white" href="#">UNI BOOK STORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link text-white" aria-current="page" href="../Home/index.php">Home</a>
        <a class="nav-link text-white" href="../Admin/admin.php">Admin</a>
        <a class="nav-link text-white" href="../Pengadaan/pengadaan.php">Pengadaan</a>
      </div>
    </div>
  </div>
</nav>
<div class="container my-4">
  <h4>Tabel Buku</h4>
  <a href="tambah.php" class="btn btn-success ">Tambah Data</a>
  <table class="table table-striped mt-2" >
    <tr>
      <th>No</th>
      <th>Id Buku</th>
      <th>Kategori</th>
      <th>Nama Buku</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Penerbit</th>
      <th>Action</th>
    </tr>
    <?php
    $no = 1;
    foreach($buku as $row){
    ?>
    <tr>
      <td><?= $no?></td>
      <td><?= $row['id_buku'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td><?= $row['nama_buku'] ?></td>
      <td><?= "Rp " .number_format($row['harga'],0,'.','.')  ?></td>
      <td><?= $row['stok'] ?></td>
      <td><?= $row['nama']?></td>
      <td><a href="edit.php?id=<?= $row['id']?>"><button class="btn btn-warning btn-sm">Edit</button></a> | <a href="delete.php?id=<?= $row['id']?>" onclick="return confirm('Yakin ?');"><button class="btn btn-danger btn-sm">Hapus</button></a></td>
    </tr>
    <?php $no++; } ?>
  </table>

  <hr class="my-5">
  <h4>Tabel Penerbit</h4>
  <a href="tambahPenerbit.php" class="btn btn-success ">Tamabah Data</a>
  <table class="table table-striped my-3">
    <tr>
      <th>No</th>
      <th>Id Penerbit</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Kota</th>
      <th>Telepon</th>
      <th>Action</th>
    </tr>
    <!-- Menampilkan data -->
    <?php 
    $no = 1;
    foreach($penerbit as $row){
    ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $row['id_penerbit']?></td>
      <td><?= $row['nama']?></td>
      <td><?= $row['alamat']?></td>
      <td><?= $row['kota']?></td>
      <td>
      <?php 
      // mengambil nomor handphone 
      $handphone = $row['telepon'];
      // menghitung jumlah digit nomor handphone
      $jumlah_digit_handphone = strlen($handphone);
      // nomor handphone yang ditampilkan jika berjumlah 9 digit
      if ($jumlah_digit_handphone == 9) {
          $tampil_handphone = substr($handphone, 0, 3) . "-" . substr($handphone, 3, 3) . "-" . substr($handphone, 6, 3);
      }
      // nomor handphone yang ditampilkan jika berjumlah 10 digit
      if ($jumlah_digit_handphone == 10) {
          $tampil_handphone = substr($handphone, 0,3) . "-" . substr($handphone,3,7);
      }
      // nomor handphone yang ditampilkan jika berjumlah 11 digit
      if ($jumlah_digit_handphone == 11) {
          $tampil_handphone = substr($handphone, 0, 3) . "-" . substr($handphone, 3, 4) . "-" . substr($handphone, 7, 4);
      }
      // nomor handphone yang ditampilkan jika berjumlah 12 digit
      if ($jumlah_digit_handphone == 12) {
          $tampil_handphone = substr($handphone, 0, 4) . "-" . substr($handphone, 4, 4) . "-" . substr($handphone, 8, 4);
      }

      echo $tampil_handphone;
      ?>

    </td>
      <td><a href="editPenerbit.php?id=<?= $row['id']?>"><button class="btn btn-warning btn-sm">Edit</button></a> | <a href="deletePenerbit.php?id=<?= $row['id']?>" onclick="return confirm('Yakin ?');"><button class="btn btn-danger btn-sm">Hapus</button></a></td>
    </tr>
    <?php $no++; }?>
  </table>
  </div>
</body>
</html>