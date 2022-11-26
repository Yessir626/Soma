<?php include('config.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOMA</title>
</head>
<body>
  <h3>Welcome <?php echo $_SESSION['nama'];?> to<br></b></h3>
  <h1>SOMA | Solusi Mahasiswa</h1>
  <h2>Saldo<br>Rp <?php echo  number_format($_SESSION['saldo'],2,',','.');?></br></h2>
  <h3>Menu</h3>
  <ul><li class = "dropdown">
    <a href="javascript:void(0)" class ="dropbtn">Transaksi</a>
    <div class ="dropdown-content">
      <a href="pendapatan.php">Pendapatan</a><br>
      <a href="pengeluaran.php">Pengeluaran</a>
    </div>
  </li></ul>
  <!-- <ul><li>
    <a href="transaksi.php">Transaksi</a>
  </li></ul> -->
  <ul><li class = "dropdown">
    <a href="javascript:void(0)" class ="dropbtn">Reminder</a>
    <div class ="dropdown-content">
      <a href="target.php">Target</a><br>
      <a href="tugas.php">Tugas</a>
    </div>
  </li></ul>
 <p>
 <a href="index.php">Log Out</a>
 </p>
</body>
</html>

<?php if (isset($_GET['status'])): ?>
  <p>
    <?php
    if ($_GET['status'] == 'sukses') {
      echo "Transaksi berhasil!";
    } else {
      echo "Transaksi gagal!";
    }
    return false;
    ?>
  </p>
<?php endif; ?>
