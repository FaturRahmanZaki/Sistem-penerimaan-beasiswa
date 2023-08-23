<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Login Admin</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        session_start();
                        include 'config.php';

                        $admin_accounts = [
                            'admin' => 'admin' // Ganti dengan password yang Anda inginkan
                        ];

                        $error_message = ""; // Inisialisasi pesan kesalahan

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            if (isset($admin_accounts[$username]) && $admin_accounts[$username] === $password) {
                                $_SESSION['admin_logged_in'] = true;
                                header("Location: dashboard.php");
                                exit();
                            } else {
                                $error_message = "Username atau password salah.";
                            }
                        }
                        ?>

                        <?php if (!empty($error_message)) : ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script untuk Bootstrap JS (pilihan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
