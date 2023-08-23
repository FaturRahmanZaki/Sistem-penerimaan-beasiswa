<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $beasiswa = $_POST['beasiswa'];

    // Cek IPK untuk menentukan status ajuan
    if ($ipk >= 3) {
        $status_ajuan = "belum di verifikasi";
    } else {
        $status_ajuan = "tidak memenuhi syarat";
    }

    // Proses berkas upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["berkas"]["name"]);
    $berkas = "";

    if (isset($_FILES["berkas"]) && $_FILES["berkas"]["error"] == 0) {
        $berkas = $_FILES['berkas']['name'];
        $berkas_tmp = $_FILES['berkas']['tmp_name'];
        move_uploaded_file($berkas_tmp, $target_file);
    } else {
        $berkas = "Tidak ada berkas yang diunggah.";
    }

    $query = "INSERT INTO registrations (nama, email, nomor_hp, semester, ipk, beasiswa, berkas, status_ajuan) 
              VALUES ('$nama', '$email', '$nomor_hp', '$semester', '$ipk', '$beasiswa', '$berkas', '$status_ajuan')";

    if (mysqli_query($db, $query)) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . mysqli_error($db);
    }

    // Redirect kembali ke halaman daftar setelah proses selesai
    header("Location: daftar.php");
    exit();
}
?>
