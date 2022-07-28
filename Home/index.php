<?php
include '../Controller/function.php';

//menampilkan data buku
$buku = readData("SELECT buku.*, penerbit.nama FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit");
$penerbit = readData("SELECT * FROM penerbit");


if (isset($_POST["cari"])) {
  //menampilkan data buku setelah pencarian
  $buku = cari($_POST["keyword"]);
}
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
<div class="container my-5">
    <form class="d-flex w-50 float-right" role="search" action="" method="POST">
      <input class="form-control me-2" type="text" name="keyword" value="" placeholder="Search Book" aria-label="Search">
      <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
    </form>
  <h4 class="mt-3">Data Buku</h4>
  <table class="table table-striped mt-3" >
    <tr>
      <th>No</th>
      <th>Id Buku</th>
      <th>Kategori</th>
      <th>Nama Buku</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Penerbit</th>
    </tr>
    <?php
    $no = 1;
    foreach($buku as $row){
    ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $row['id_buku'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td><?= $row['nama_buku'] ?></td>
      <td><?= "Rp " .number_format($row['harga'],0,'.','.')  ?></td>
      <td><?= $row['stok'] ?></td>
      <td><?= $row['nama'] ?></td>
    </tr>
    <?php $no++;
  } ?>
  </table>
</div>
</body>
</html>