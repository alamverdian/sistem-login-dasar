<?php
// 1. koneksi database
include 'config/database.php';

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // 2. validasi panjang password
    if (strlen($password) < 6) {
        echo "<script>alert('Password minimal 6 karakter');</script>";
        exit;
    }

    // 3. cek username/email sudah ada (prepared statements lebih aman)
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ? OR email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        // sudah ada
        header("Location: register.php?user_exists=1");
        mysqli_stmt_close($stmt);
        exit;
    }
    mysqli_stmt_close($stmt);

    // 4. hash password (aman)
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // 5. simpan user baru (prepared statement)
    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed);
    $saved = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($saved) {
        header("Location: login.php?register_success=1");
        exit;
    } else {
        header("Location: register.php?register_failed=1");
		exit; 
    }
}
?>
<!-- HTML form di bawah -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4" style="width: 400px;">
    <h3 class="text-center mb-3">Buat Akun Baru</h3>
	
	 <?php
    // ==== ALERT AREA ====
    $alert = '';
    if (isset($_GET['user_exists'])) {
        $alert = '<div class="alert alert-warning text-center" role="alert">
                    Username atau email sudah terdaftar!
                  </div>';
    }
    if (isset($_GET['register_success'])) {
        $alert = '<div class="alert alert-success text-center" role="alert">
                    Registrasi berhasil! Silakan login.
                  </div>';
    }
    if (isset($_GET['register_failed'])) {
        $alert = '<div class="alert alert-danger text-center" role="alert">
                    Registrasi gagal, coba lagi.
                  </div>';
    }
    echo $alert;
    ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password (min 6 karakter)</label>
        <input name="password" type="password" class="form-control" required>
      </div>
      <button name="submit" class="btn btn-success w-100">Daftar</button>
    </form>
    <p class="mt-3 text-center">Sudah punya akun? <a href="login.php">Masuk disini</a></p>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
