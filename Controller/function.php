<?php
//mengkoneksikan project dengan databases
$Koneksi = mysqli_connect('localhost','sihab','password','data');

//menampilkan data
function readData($query){
  //memasukan variable koneksi
  global $Koneksi;
  
  //mengambil seluruh data yang ada di databases
  $hasil = mysqli_query($Koneksi,$query);

  //untuk menampung data
  $data = [];

  //merubah data ke array assosiatif
  while($row = mysqli_fetch_assoc($hasil)){
    $data[] = $row;
  }

  //mengirim nilai yang ada di variabel data
  return $data;

}

//Function Buku Star


function addData($data){
  global $Koneksi;
  //mengambil data dari inputan
  $id = htmlspecialchars($data['id_buku']);
  $kategori = htmlspecialchars($data['kategori']);
  $nama = htmlspecialchars($data['nama_buku']);
  $harga = htmlspecialchars($data['harga']);
  $stok = htmlspecialchars($data['stok']);
  $penerbit = htmlspecialchars($data['id_penerbit']);

  //memasukan query
  $query = "INSERT INTO buku VALUES(NULL,'$id','$kategori','$nama',$harga,$stok,'$penerbit')";
  $simpan = mysqli_query($Koneksi,$query);

  if($simpan){
    header('location:admin.php');
  }else{
    echo "data gagal ditambah";
  }
}

function editData($data){
  global $Koneksi;
  
  $id = $data['id'];
  $id_buku = htmlspecialchars($data['id_buku']);
  $kategori = htmlspecialchars($data['kategori']);
  $nama = htmlspecialchars($data['nama_buku']);
  $harga = htmlspecialchars($data['harga']);
  $stok = htmlspecialchars($data['stok']);
  $penerbit = htmlspecialchars($data['id_penerbit']);

  $query = "UPDATE buku SET id_buku = '$id_buku',kategori = '$kategori',nama_buku = '$nama',harga = $harga, stok = $stok,id_penerbit = '$penerbit' WHERE id = $id";
  $simpan = mysqli_query($Koneksi,$query);

  if($simpan){
    header('location:admin.php');
  }else{
    echo "data gagal dirubah";
  }
}

function hapusData($id)
{
  global $Koneksi;

  $simpan = mysqli_query($Koneksi, "DELETE FROM buku WHERE id = $id");
  
  if($simpan){
    header('location:admin.php');
  }else{
    echo "data gagal dihapus";
  }
}

//function Buku End

//function Penerbit Star

function addDataPenerbit($data){
  global $Koneksi;

  $id = htmlspecialchars($data['id_penerbit']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $kota = htmlspecialchars($data['kota']);
  $telepon = htmlspecialchars($data['telepon']);

  $query = "INSERT INTO penerbit VALUES(NULL,'$id','$nama','$alamat','$kota','$telepon')";
  $simpan = mysqli_query($Koneksi,$query);

  if($simpan){
    header('location:admin.php');
  }else{
    echo "data gagal ditambah";
  }
}

function editDataPenerbit($data){
  global $Koneksi;
  
  $id = $data['id'];
  $id_penerbit = htmlspecialchars($data['id_penerbit']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $kota = htmlspecialchars($data['kota']);
  $telepon = htmlspecialchars($data['telepon']);

  $query = "UPDATE penerbit SET id_penerbit = '$id_penerbit',nama = '$nama',alamat = '$alamat', kota = '$kota',telepon = '$telepon' WHERE id = $id";
  $simpan = mysqli_query($Koneksi,$query);

  if($simpan){
    header('location:admin.php');
  }else{
    echo "data gagal dirubah";
  }
}
function hapusDataPenerbit($id)
{
    global $Koneksi;
    $simpan = mysqli_query($Koneksi, "DELETE FROM penerbit WHERE id = $id");
  
    if($simpan){
    header('location:admin.php');
  }else{
    echo "data gagal ditambah";
  }
}

//function penerbit end

//function search
function cari($keyword)
{
    $query = "SELECT buku.*, penerbit.* FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit WHERE nama LIKE  '%$keyword%' OR kategori LIKE '%$keyword%' OR nama_buku LIKE '%$keyword%'";

    return readData($query);
}
?>