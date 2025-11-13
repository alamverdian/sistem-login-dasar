<?php
session_start();
include 'config/database.php';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Ambil data user berdasarkan username
    $stmt = mysqli_prepare($conn, "SELECT id, username, password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $user, $hash);
    $found = mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($found) {
        // bandingkan password yang diinput dengan hash di DB
        if (password_verify($password, $hash)) {
            // sukses -> buat session
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
			header("Location: login.php?login_failed=1");
			exit;
        }
    } else {
    header("Location: login.php?user_not_found=1");
	exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4" style="width: 400px;">
    <h3 class="text-center mb-3">Login Akun</h3>

<?php if (isset($_GET['login_failed'])): ?>
    <div class="alert alert-danger text-center" role="alert">
        Password salah, coba lagi 🔐
    </div>
<?php elseif (isset($_GET['user_not_found'])): ?>
    <div class="alert alert-warning text-center" role="alert">
        Username tidak ditemukan 😢
    </div>
<?php elseif (isset($_GET['register_success'])): ?>
	<div class="alert alert-success text-center" role="alert">
	Registrasi berhasil! Silakan login.
    </div>
<?php elseif (isset($_GET['logged_out'])): ?>
	<div class="alert alert-info text-center" role="alert">
	Kamu sudah logout.
    </div>
<?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" required>
      </div>
      <button name="login" class="btn btn-primary w-100">Masuk</button>
    </form>
    <p class="mt-3 text-center">Belum punya akun? <a href="register.php">Daftar disini</a></p>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
