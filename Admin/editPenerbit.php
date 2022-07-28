<?php
include '../Controller/function.php';
$id = $_GET['id'];
$data = readData("SELECT * FROM penerbit WHERE id = $id")[0];

if(isset($_POST['save'])){
  editDataPenerbit($_POST);
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
  <h4>Edit Data Penerbit</h4>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $id?>">
  <table class="table table-borderless w-50">
    <tr>
      <td><label for="id">Id Penerbit</label></td>
      <td>:</td>
      <td><input type="text" id="id" class="form-control" value="<?= $data['id_penerbit']?>" name="id_penerbit"></td>
    </tr>
    <tr>
      <td><label for="nama">Nama</label></td>
      <td>:</td>
      <td><input type="text" id="nama" class="form-control" value="<?= $data['nama']?>" name="nama"></td>
    </tr>
    <tr>
      <td><label for="alamat">Alamat</label></td>
      <td>:</td>
      <td><input type="text" id="alamat" class="form-control" value="<?= $data['alamat']?>" name="alamat"></td>
    </tr>
     <tr>
      <td><label for="kota">Kota</label></td>
      <td>:</td>
      <td><input type="text" id="kota" class="form-control" value="<?= $data['kota']?>" name="kota"></td>
    </tr>
    <tr>
      <td><label for="telepon">Telepon</label></td>
      <td>:</td>
      <td><input type="number" id="telepon" class="form-control" value="<?= $data['telepon']?>" name="telepon"></td>
    </tr>
    <tr>
      <td><button type="submit" class="btn btn-success" name="save">Save</button></td>
    </tr>
  </table>

  </form>
</div>
</body>
</html>