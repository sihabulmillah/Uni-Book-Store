<?php
include '../Controller/function.php';

$id = $_GET['id'];
$data = readData("SELECT * FROM buku WHERE id = $id")[0];


$penerbit = readData("SELECT * FROM penerbit");

if(isset($_POST['save'])){
  editData($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
<div class="container mt-4">

  <h4>Edit Data Buku</h4>

  <form action="" method="post">
  <input type="hidden" name="id" value="<?= $id ?>">
  <table class="table table-borderless w-50">
    <tr>
      <td><label for="id">Id Buku</label></td>
      <td>:</td>
      <td><input type="text" id="id" class="form-control" value="<?= $data['id_buku']  ?>" name="id_buku"></td>
    </tr>
    <tr>
      <td><label for="kategori">Kategori</label></td>
      <td>:</td>
      <td><input type="text" id="kategori" class="form-control" value="<?= $data['kategori'] ?>" name="kategori"></td>
    </tr>
    <tr>
      <td><label for="nama">Nama Buku</label></td>
      <td>:</td>
      <td><input type="text" id="nama" class="form-control" value="<?= $data['nama_buku'] ?>" name="nama_buku"></td>
    </tr>
    <tr>
      <td><label for="harga">Harga</label></td>
      <td>:</td>
      <td><input type="number" id="harga" class="form-control" value="<?= $data['harga'] ?>" name="harga"></td>
    </tr>
    <tr>
      <td><label for="stok">Stok</label></td>
      <td>:</td>
      <td><input type="number" id="stok" class="form-control" value="<?= $data['stok'] ?>" name="stok"></td>
    </tr>
    <tr>
      <td><label for="penerbit">Penerbit</label></td>
      <td>:</td>
      <td>
        <select name="id_penerbit" class="form-select" id="penerbit">
        <?php 
        foreach($penerbit as $row){
        ?> 
        <option value="<?= $row["id_penerbit"] ?>" <?php if ($data["id_penerbit"] == $row["id_penerbit"]) {
        echo "selected";} ?>><?= $row["nama"] ?></option>
        <?php } ?>
      </select>
    </td>
    </tr>
    <tr>
      <td><button type="submit" class="btn btn-success" name="save">Save</button></td>
    </tr>
  </table>

  </form>
</div>
</body>
</html>