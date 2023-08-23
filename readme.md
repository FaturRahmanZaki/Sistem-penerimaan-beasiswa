## Sistem Beasiswa

Sistem Beasiswa adalah aplikasi yang digunakan oleh kampus untuk mengelola data mahasiswa penerima beasiswa. Aplikasi ini dirancang untuk memudahkan proses pendataan dan pemantauan mahasiswa yang mendapatkan bantuan beasiswa di lingkungan kampus. 

### Spesifikasi Teknis

- **Bahasa Pemrograman**: PHP 8
- **Server Web**: Apache
- **Database**: MySQL
- **Ukuran**: Sekitar 1 MB

### Prasyarat

Untuk menjalankan Sistem Beasiswa pada perangkat Anda, pastikan telah terpenuhi prasyarat berikut:

1. **PHP 8**: Pastikan perangkat Anda telah terinstal PHP versi 8. Jika belum, Anda dapat mengunduh dan menginstalnya dari [php.net](https://www.php.net/downloads).
2. **Server Web (Apache)**: Anda memerlukan server web Apache yang sudah terkonfigurasi dengan benar. Anda bisa mendapatkan informasi lebih lanjut mengenai instalasi dan konfigurasi Apache di [situs resmi Apache HTTP Server](https://httpd.apache.org/docs/).
3. **Database MySQL**: Pastikan MySQL Server telah terinstal. Anda bisa mendownload MySQL dari [situs resmi MySQL](https://dev.mysql.com/downloads/).
4. **Ekstensi PHP yang Diperlukan**: Pastikan ekstensi PHP yang diperlukan seperti mysqli telah diaktifkan di konfigurasi PHP Anda.

### Instalasi

1. Clone repositori ini dari GitHub:

   ```bash
   git clone https://github.com/FaturRahmanZaki/NamaRepositoriAnda.git
   ```

2. Pindah ke direktori projek:

   ```bash
   cd NamaRepositoriAnda
   ```

3. Letakkan direktori projek di dalam direktori root web server Anda (misalnya, di dalam folder `htdocs` pada XAMPP).

4. Buat database di MySQL untuk sistem beasiswa Anda.

5. Impor tabel ke dalam database Anda menggunakan berkas `.sql` yang disediakan.

6. Konfigurasi koneksi database dengan mengedit berkas `config.php`. Isikan detail koneksi seperti host, username, password, dan nama database.

7. Pastikan folder `uploads` memiliki izin tulis untuk menyimpan berkas yang diunggah.

### Penggunaan

1. Akses aplikasi melalui web browser dengan URL yang sesuai. Misalnya, `http://localhost/NamaRepositoriAnda`.

2. Aplikasi akan membuka halaman pendaftaran. Isi formulir dengan data mahasiswa yang sesuai.

3. Unggah berkas yang diperlukan sesuai instruksi pada formulir.

4. Setelah mengisi formulir dan mengunggah berkas, klik tombol "Submit" atau "Daftar".

5. Data mahasiswa dan status ajuan beasiswa akan tersimpan di database.

### Kontributor

- Nama: Fatur Rahman Zaki
- GitHub: [@FaturRahmanZaki](https://github.com/FaturRahmanZaki)

Untuk melihat proyek ini secara detail, kunjungi [repositori GitHub saya](https://github.com/FaturRahmanZaki/NamaRepositoriAnda).

---

Dengan mengikuti panduan ini, Anda akan dapat menjalankan dan menggunakan Sistem Beasiswa dengan lancar. Jika Anda memiliki pertanyaan atau masalah, silakan buat _issue_ di repositori GitHub atau hubungi saya melalui informasi kontak di profil GitHub saya. Terima kasih telah menggunakan Sistem Beasiswa!