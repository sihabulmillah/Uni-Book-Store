
<?php
//menyertakan file function
include '../Controller/function.php';

//menampilkan data buku
$buku = readData("SELECT buku.nama_buku,stok, penerbit.nama FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit WHERE stok < 10 ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Uni Book Store</title>
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
<div class="container mt-4">
  <h4>Kebutuhan Buku</h4>
  <small class="fs-small">*Segera beli</small>
  <table class="table table-striped">
    <tr>
      <th>Judul Buku</th>
      <th>Penerbit</th>
      <th>Stok</th>
    </tr>
    <?php 
    foreach($buku as $row){
    ?>
    <tr>
      <td><?= $row['nama_buku']?></td>
      <td><?= $row['nama']?></td>
      <td><?= $row['stok']?></td>
    </tr>
    <?php }?>
  </table>
</div>
</body>
</html>
