<?php include('config.php'); ?>
<?php
session_start();
if (isset($_SESSION['username'])) {
}

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == 'admin' and $password == 'admin') {
    header('location:adminpage.php?');
    exit;
  }

  //jika form kosong
  else if ($username == ''  or $password == '') {
    $err .= '<h2 style="color:red">Username dan Password salah!</h2>';
  }

  //mengecek apakah username sudah diisi atau belum
  else if (empty($err)) {

    //jika terisi maka akan mengecek  username apakah sama dengan database
    $result  = pg_query($db, "SELECT * from users where username = '$username'");
    $row = pg_fetch_array($result);


    // if (pg_num_rows($result) > 0) {

    //   $row = pg_fetch_array($result);
    //   $_SESSION['username'] = $row['username'];
    //   $_SESSION['nama'] = $row['nama'];
    //   $_SESSION['saldo'] = $row['saldo'];

    //   //cek password
    //   if (password_verify($password, $row['password'])) { //kebalikan dari password_hesh
    //     header('Location:homepage.php?');
    //     exit;
    //   } else {
    //     //mengecek jika diisi salah dan tidak diisi
    //     $err = '<h2 style="color:red">Username dan Password salah!</h2>';
    //   }
    // }

    if(pg_num_rows($result)>0){
      
      $_SESSION['username'] = $row['username'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['saldo'] = $row['saldo'];
      password_verify($password, $row['password']);
      header('Location:homepage.php?');
    }else {
      //mengecek jika diisi salah 
      $err = '<h2 style="color:red">Username dan Password salah!</h2>';
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
 
  <link rel="stylesheet" href="style.css">

   <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

 

  <title>SOMA | Login</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>
  <div id="app">
    <header>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6">
            <div class="form-group">
              <h1>Welcome Back</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6">
            <div class="form-group">
            <h6>Please login to use SOMA!</h6>
            </div>
          </div>
        </div>
      </div>
  </div>
  </header>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="form-group">
          <div>
            <?php
            //kondisi jika tidak diisi
            if ($err) {
              echo "<ul>$err</ul><b></b>";
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <form action="" , method="post">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Isikan Username" required /><br />
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="form-group">
            <div class="input">
              <div class="input__overlay" id="input_overlay"></div>
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="input_overlay" placeholder="Isikan Password" class="input_password" id="input_pass" required>
              <!-- <i class='bx bx-hide input__icon' id="input-icon"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="form-group">
            <input type="submit" name="login" value="Login" /> <br><br>
            <label for=""> Tidak punya akun? <a href="formdaftar.php">Sign Up</a></label>
          </div>
        </div>
      </div>
    </div>
    </div>






  </form>
  </div>

</body>

</html>

<?php if (isset($_GET['status'])):?>
  <p>
    <?php
    if ($_GET['status'] == 'sukses') {
      echo "Pendaftaran berhasil!";
    } else {
      echo "Pendaftaran gagal!";
    }
    return false;
    ?>
  </p>
<?php endif; ?>