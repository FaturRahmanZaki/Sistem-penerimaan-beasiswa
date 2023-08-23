<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "beasiswa";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db) {
  die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Beasiswa</title>

</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#main" style="margin-left: 30px;">Pilihan Beasiswa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#daftar">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#hasil" style="margin-right: 205px;">Hasil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Navbar ENd -->

  <main class="bg-light">
    <section id="main">
      <div class="position-relative overflow-hidden p-9 p-md-4 m-md-1 text-center bg-light">
        <div class="col-md-5 p-lg-6 mx-auto my-5">
          <h1 class="display-5 fw-normal">Selamat Datang Di pilihan Mahasiswa</h1><br>
          <p class="lead fw-normal">temukan berbagai Jenis Beasiswa untuk mewujudkan impian pendidikan anda</p>
          <a class="btn btn-outline-secondary" href="#daftar"> Daftar</a>
        </div>
      </div>
    </section>
    <section id="daftar" class="py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card p-4">
              <h2 class="card-title text-center">Daftar Beasiswa</h2>
              <p class="card-text text-center">Di sini Anda dapat mendaftar untuk berbagai jenis beasiswa yang tersedia.</p>
              <form id="form-pendaftaran" method="POST" action="process_registration.php" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="nomor-hp">Nomor HP</label>
                  <input type="tel" class="form-control" id="nomor-hp" name="nomor_hp" pattern="[0-9]{10,12}" required>
                </div>
                <div class="mb-3">
                  <label for="semester">Semester Saat Ini</label>
                  <select class="form-control" id="semester" name="semester" required>
                    <option value="">Pilih Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="ipk">IPK</label>
                  <input type="number" class="form-control" id="ipk" name="ipk" step="0.01" value="" onchange="validateIPK(this.value)">
                  <p id="ipk-warning" style="color: red;"></p>
                </div>
                <div class="mb-3">
                  <label for="beasiswa">Pilih Beasiswa</label>
                  <select class="form-control" id="beasiswa" name="beasiswa" required>
                    <option value="">Pilih Beasiswa</option>
                    <option value="akademik">Beasiswa Akademik</option>
                    <option value="non-akademik">Beasiswa Non-Akademik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="berkas">Unggah Berkas</label>
                  <input type="file" class="form-control" id="berkas" name="berkas" accept=".pdf,.jpg,.jpeg,.png,.zip" required>
                </div>
                <button type="submit" class="btn btn-primary" id="daftar-button">Daftar</button>
                <input type="reset" class="btn btn-primary">
              </form>
            </div>
    </section>


    <!-- list pendaftar -->
    <section id="hasil" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card p-4">
          <h2 class="card-title text-center">Status Pendaftaran Beasiswa</h2>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Semester</th>
                <th>Pilihan Beasiswa</th>
                <th>Status Ajuan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Query untuk mengambil data dari tabel registrations
              $query = "SELECT nama, email, semester, beasiswa, status_ajuan, ipk FROM registrations";
              $result = mysqli_query($db, $query);

              // Inisialisasi nomor awal
              $nomor = 1;

              // Periksa apakah query berhasil dieksekusi
              if ($result) {
                // Loop melalui hasil query dan tampilkan data dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $nomor . "</td>"; // Tampilkan nomor
                  $nomor++;
                  echo "<td>" . $row['nama'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['semester'] . "</td>";
                  echo "<td>" . $row['beasiswa'] . "</td>";

                  // Ganti warna teks berdasarkan status verifikasi
                  if ($row['status_ajuan'] === 'terverifikasi') {
                    echo "<td style='color: green;'>" . $row['status_ajuan'] . "</td>";
                  } else {
                    echo "<td>" . $row['status_ajuan'] . "</td>";
                  }

                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='7'>Tidak ada data pendaftaran yang ditemukan.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- list pendaftar  end-->




    <section id="footer">
      <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#daftar" class="nav-link px-2 text-muted">Daftar</a></li>
            <li class="nav-item"><a href="#hasil" class="nav-link px-2 text-muted">Hasil</a></li>
            <li class="nav-item"><a href="login.php" class="nav-link px-2 text-muted" target="_blank">admin?</a></li>
          </ul>
          <p class="text-center text-muted">&copy; 2023 Sertifikasi, BNSP</p>
        </footer>
    </section>
    </div>
  </main>

  <script>
    function validateIPK(ipkValue) {
      var ipkInput = document.getElementById('ipk');
      var beasiswaSelect = document.getElementById('beasiswa');
      var berkasInput = document.getElementById('berkas');
      var daftarButton = document.getElementById('daftar-button');
      var ipkWarning = document.getElementById('ipk-warning');

      if (parseFloat(ipkValue) < 3) {
        ipkInput.style.color = 'red';
        ipkWarning.textContent = 'IPK harus di atas 3 untuk melanjutkan pilihan beasiswa.';
        beasiswaSelect.disabled = true;
        berkasInput.disabled = true;
        daftarButton.disabled = true;
      } else {
        ipkInput.style.color = 'black';
        ipkWarning.textContent = '';
        beasiswaSelect.disabled = false;
        berkasInput.disabled = false;
        daftarButton.disabled = false;
      }
    }
  </script>


<!-- js dibawah mendifinisakn ipk -->
<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Set default IPK value to 3.4
    var ipkInput = document.getElementById('ipk');
    ipkInput.value = '3.4';
    
    var beasiswaSelect = document.getElementById('beasiswa');
    var berkasInput = document.getElementById('berkas');
    var daftarButton = document.getElementById('daftar-button');
    
    // Disable elements initially
    beasiswaSelect.disabled = false;
    berkasInput.disabled = false;
    daftarButton.disabled = false;
  });
</script> -->



  <!-- <script src="assets/js/app.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>