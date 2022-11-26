<?php
include("config.php");
if(isset($_GET['nama']) ){
  
  //ambil id dari queru string
  $nama = $_GET['nama'];

  // buat query hapus 
  $result = pg_query("DELETE FROM  users where nama = '$nama'");

  //apakah query hapus berhasil?
  if($result == TRUE){
    header('Location: adminpage.php');
  }else{
    die("gagal menghapus...");
  } 
  }else {
    die("akses dilarang...");
}
?>