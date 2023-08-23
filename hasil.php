<?php
include 'config.php';

$i = 1;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sistem Beasiswa</title>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Chart -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Css -->
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <!-- TopBar -->
    <section class="bg-dark">
        <div class="row">
            <div class="col-md-4">
                <p class="text-center navbar-top">
                    <a href="index.php" class="text-decoration-none text-white"> Pilihan Beasiswa </a>
                </p>
            </div>
            <div class="col-md-4">
                <p class="text-center navbar-top">
                    <a href="daftar.php" class="text-decoration-none text-white"> Daftar </a>
                </p>
            </div>
            <div class="col-md-4">
                <p class="text-center navbar-top">
                    <a href="hasil.php" class="text-decoration-none text-white"> Hasil </a>
                </p>
            </div>
        </div>
    </section>

    <h3 class="text-center mt-3"> Hasil Pendataan Beasiswa </h3>
    <!-- Table Data -->
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5>Data Terkini</h5>
                        </div>
                        <div class="col-6">
                            <p class="text-end"><a href="grafik.php" class="btn btn-primary">Lihat Grafik</a></p>
                        </div>
                    </div>
                    <?php if ($_GET['status'] == 'deletesuccess') : ?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil dihapus
                        </div>
                    <?php elseif ($_GET['status'] == 'updatesuccess') : ?>
                        <div class="alert alert-primary" role="alert">
                            Status berhasil diubah
                        </div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">IPK</th>
                                <th scope="col">Jenis Beasiswa</th>
                                <th scope="col">Status Ajuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $query = "SELECT * FROM mahasiswa";
                            $sql = mysqli_query($db, $query); ?>
                            <?php if ($sql) : ?>
                                <!-- Loop -->
                                <?php while ($mahasiswa = mysqli_fetch_array($sql)) : ?>
                                    <tr>
                                        <td><?= $i;
                                            $i++; ?></td>
                                        <td><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['email'] ?></td>
                                        <td><?= $mahasiswa['no_hp'] ?></td>
                                        <td><?= $mahasiswa['ipk'] ?></td>
                                        <td><?= $mahasiswa['beasiswa'] ?></td>
                                        <td><?= $mahasiswa['status_ajuan'] == 'belum' ? 'Belum Diverifikasi' : 'Terverifikasi' ?></td>
                                        <td>
                                            <a href="edit.php?edit=<?= $mahasiswa['id'] ?>" class="btn btn-primary btn-sm text-white">Edit Status Ajuan</a>
                                            <a href="delete.php?destroy=<?= $mahasiswa['id'] ?>" class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <p class="text-center text-secondary">Data masih kosong</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!--Option 1: Bootstrap Bundle with Popper-->
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>