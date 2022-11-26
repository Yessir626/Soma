<?php include('config.php');
session_start();
if(isset($_POST['submit'])){

  //menerima data dari tombol submit pada transaksi
  $pendapatan =$_POST['pemasukkan'];
  $tanggal_transaksi =$_POST['tanggal_pengeluaran'];

  //kategori pengeluaran
  $jenis_pengeluaran1 =$_POST['harian'];
  $jenis_pengeluaran2 =$_POST['makan'];
  $jenis_pengeluaran3 =$_POST['pajak'];
  $jenis_pengeluaran4 =$_POST['pakaian'];
  $jenis_pengeluaran5 =$_POST['rekreasi'];

  




}
?>
