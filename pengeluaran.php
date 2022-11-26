<?php include('config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <title>SOMA | Pemasukkan</title>
</head>

<body>
  <form action="homepage.php" method="POST">
  <section class="container">
    <h4>Pengeluaran</h4>
    <br>
      <label for="pemasukkan">Kategori Pengeluaran</label>
      <br>
      <select name="katergori_pengeluaran" id="kategori_pengeluaran" required>
        <option> -- Pilih --</option>
        <option value="harian">Harian</option>
        <option value="makan">Makan</option>
        <option value="pakaian">Pakaian</option>
        <option value="rekreasi">Rekreasi</option>
      </select>
      <br>
      <div class="row">
        <div class="col-lg-7">
          <div class="form-group"><br>
            <form>
              <label for="tanggal_Pengeluaran">Tanggal Pengeluaran</label>
              <div class="col-sm-4">
                <div class="input-group date" id="datepicker">
                  <input type="text" class="form-control" name="tanggal_pengeluaran" placeholder="Tanggal Transaksi">
                  <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </span>
                </div>
              </div>
          </div>
  </form>


  <script type="text/javascript">
    $(function() {
      $('#datepicker').datepicker();
    });
  </script>
  <br>
  <p>
    <label for="nominal">Jumlah Nominal</label><br>
    <input type="number" name="nominal" pattern="[0-9]" placeholder="masukkan nominal">
  </p>
  <label for="deksripsi">Keterangan</label><br>
  <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" placeholder="Masukkan Keterangan"></textarea>
  <br><br>

  <p>
    <input type="submit" value="submit" name="submit" />
  </p>
  </section>
  </form>

</body>

</html>