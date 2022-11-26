<?php include('config.php');
session_start();
if(isset($_POST['submit'])){

  

  //menerima data dari tombol submit pada transaksi
  $username =$_SESSION['username'];
  $saldo =$_SESSION['saldo'];
  $nominal =$_POST['nominal'];
  $tanggal_transaksi =$_POST['tanggal_pemasukkan'];
  $deskripsi = $_POST['deskripsi'];

  //kategori pemasukkan
  $kategori_pemasukkan = $_POST['kategori_pemasukkan'];

  // $jenis_pemasukkan1 =$_POST['bonus'];
  // $jenis_pemasukkan2 =$_POST['invetasi'];
  // $jenis_pemasukkan3 =$_POST['tarik_uang'];
  // $jenis_pemasukkan4 =$_POST['penghasilan'];

  //menambah saldo
  $saldo = $saldo + $nominal;
  $result1 = pg_query(($db, "UPDATE users(username,nama,sa" ));

  //membuat query
  $result2 = pg_query($db, "INSERT TO pendapatan(username, deksripsi, nominal, tanggal_pemasukaan, kategori_pemasukkan) VALUES('$username', '$deskripsi, '$nominal', '$tanggal_pemasukkan', '$kategori_pemasukkan)");
  
  //query memasukkan ke database
  if($result==true){
    header('Location: homepage.php?status=sukses');
  }else{
    header('locaiton: homepage.php? status=gagal');
  }





}
?>
