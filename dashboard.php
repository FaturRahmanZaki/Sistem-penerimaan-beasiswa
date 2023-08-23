<?php
session_start();
include 'config.php';

// Fungsi untuk mengubah status ajuan
function updateStatus($id, $newStatus) {
    global $db;

    $updateQuery = "UPDATE registrations SET status_ajuan = '$newStatus' WHERE id = $id";
    $updateResult = mysqli_query($db, $updateQuery);

    if ($updateResult) {
        return true;
    } else {
        return false;
    }
}

// Cek apakah sudah login atau belum
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Proses penghapusan data
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    $deleteQuery = "DELETE FROM registrations WHERE id = $idToDelete";
    $deleteResult = mysqli_query($db, $deleteQuery);

    if ($deleteResult) {
        header("Location: dashboard.php?status=deletesuccess");
        exit();
    } else {
        echo "Failed to delete data.";
    }
}

// Proses update status
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['update']) && isset($_GET['status'])) {
    $id = $_GET['update'];
    $newStatus = $_GET['status'];

    if (updateStatus($id, $newStatus)) {
        $notifMessage = "Status berhasil diubah";
        if ($newStatus === 'belum di verifikasi') {
            $notifMessage = "Verifikasi dibatalkan";
        }
        header("Location: dashboard.php?status=updatesuccess&message=" . urlencode($notifMessage));
        exit();
    } else {
        echo "Failed to update status.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <h1 class="text-center mt-4">List Pendaftar Beasiswa</h1>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'updatesuccess') : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?php echo $_GET['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'deletesuccess') : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            Data berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">IPK</th>
                    <th scope="col">Beasiswa</th>
                    <th scope="col">Status Ajuan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM registrations";
                $result = mysqli_query($db, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $i = 1; // Inisialisasi variabel $i
                    while ($row = mysqli_fetch_assoc($result)) {
                        $statusClass = $row['status_ajuan'] == 'Terverifikasi' ? 'text-success' : '';
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['nomor_hp'] . "</td>";
                        echo "<td>" . $row['ipk'] . "</td>";
                        echo "<td>" . $row['beasiswa'] . "</td>";
                        echo "<td class='$statusClass'>" . $row['status_ajuan'] . "</td>";
                        echo "<td>";
                        if ($row['status_ajuan'] == 'belum di verifikasi') {
                            echo "<a href='dashboard.php?update=" . $row['id'] . "&status=Terverifikasi' class='btn btn-primary btn-sm me-2'>Verifikasi</a>";
                        } elseif ($row['status_ajuan'] == 'Terverifikasi') {
                            echo "<a href='dashboard.php?update=" . $row['id'] . "&status=belum di verifikasi' class='btn btn-danger btn-sm me-2'>Batal Verifikasi</a>";
                        }
                        echo "<a href='javascript:void(0);' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal' data-id='" . $row['id'] . "'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data pendaftaran.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Delete Confirmation -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                    <a href="#" class="btn btn-danger" id="confirmDeleteButton">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const confirmDeleteModal = document.getElementById('confirmDeleteModal');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        confirmDeleteModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            confirmDeleteButton.setAttribute('href', `dashboard.php?delete=${id}`);
        });
    </script>


</body>

</html>
