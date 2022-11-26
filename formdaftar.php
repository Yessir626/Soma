<?php
include('config.php');

$username ="";
$nama ="";
$password ="";
$err = "";
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

	// menerima data yang dikirim dari formdaftar
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	
	if($username == ''  or $nama == ''or $password == ''){
    $err .= header('Location: index.php?status=gagal');
  }

	//cek konfirmasi password apakah sudah sama atau belum
	else if($password !== $password2){
		$err .= '<h2 style="color:red">Password salah!</h2>';
	}

	else if(empty($err)){
		//cek username ganda
	$result = pg_query($db,"SELECT username from users where username = '$username'");

		// if(pg_fetch_assoc($result) ){
		// 	header('location: formdaftar.php?status=sukses');		
		// 	return true;
		// }

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// buat query
  //$query = pg_query("INSERT INTO user VALUES ('$username', '$nama', '$password')");
	$query =pg_query($db, "INSERT INTO users(username, nama, password, saldo) VALUES('$username', '$nama', '$password','0')");

	//apakah query simpan berhasil?
		if( $query == TRUE ) {
			// kalau berhasil alihkan ke halaman index.php dengan status=sukses
			header('Location: index.php?status=sukses');
			} else {
			// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
			header('Location: index.php?status=gagal');
			}
	}

	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SOMA | Sign Up</title>
	<style> label{
		display: block;
	}
	</style>
</head>

<body>
	<header>
		<h3>CREATE ACCOUNT</h3>
		<?php if(isset($_GET['status'])): ?>
	<p>
		<?php
			if($_GET['status'] == 'sukses'){
				echo '<h2 style="color:red">Username sudah ada!</h2>';
			}
		?>
	</p
	<?php endif; ?>
	<p>
	<?php
    //kondisi jika tidak memenuhi username atau password
    if($err){
      echo "<ul>$err</ul><b></b>";
    }
    ?>
	</p>
	
	</header>

	<form action="formdaftar.php" method="POST">
	
		<p>
			<label for="username">Username: </label>
			<input type="text" name="username" placeholder="Isikan Username" required/>
		</p>
		<p>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" placeholder="Isikan Nama Lengkap"required/>
		</p>
		<p>
			<label for="password">Password: </label>
			<input type="password" name="password" placeholder="Isikan Password"required/>
		</p>
		<p>
					<label for="password2">Password Konfirmasi: </label>
					<input type="password" name="password2" placeholder="Isikan Password"required/>
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar"/>
		</p>
		
	</form>

	</body>
</html>