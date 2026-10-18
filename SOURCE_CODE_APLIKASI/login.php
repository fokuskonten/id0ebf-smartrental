<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "config.php";
    $sql = "SELECT * FROM pelanggan WHERE username='$_POST[username]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION["pelanggan"]["is_logged"] = true;
                $_SESSION["pelanggan"]["id"] = $data["id_pelanggan"];
                $_SESSION["pelanggan"]["username"] = $data["username"];
                $_SESSION["pelanggan"]["nama"] = $data["nama"];
                $_SESSION["pelanggan"]["no_ktp"] = $data["no_ktp"];
                $_SESSION["pelanggan"]["no_telp"] = $data["no_telp"];
                $_SESSION["pelanggan"]["email"] = $data["email"];
                $_SESSION["pelanggan"]["alamat"] = $data["alamat"];
              }
            header('location: index.php');
        } else {
            echo alert("Username / Password tidak sesuai!", "login.php");
        }
    } else {
        echo "Query error!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="icon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon-16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icon-128.png">
    <link rel="manifest" href="manifest.json">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pelanggan — SmartRental</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 40px;
        }
    </style>

<!-- FK-GEMINI-THEME -->
<style>
/* FokusKonten Gemini Clean Light Theme - Rental & Transportasi */
body {
  background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f8fafc 100%) !important;
  color: #1e293b !important;
}
.fk-badge-brand, .app-brand, .login-logo, .brand-logo {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 82px !important;
  height: 82px !important;
  border-radius: 50% !important;
  background: #ffffff !important;
  border: 2px solid #e0f2fe !important;
  box-shadow: 0 8px 24px -4px rgba(2, 132, 199, 0.25) !important;
  margin-bottom: 16px !important;
  padding: 3px !important;
}
.fk-badge-brand img, .app-brand img, .login-logo img, .brand-logo img, img.fk-logo-constrained {
  width: 100% !important;
  height: 100% !important;
  max-width: 76px !important;
  max-height: 76px !important;
  border-radius: 50% !important;
  object-fit: cover !important;
  display: block !important;
}
.btn-primary, .btn-submit, button[type="submit"] {
  background: linear-gradient(135deg, #0284c7 0%, #0369a1 50%, #38bdf8 100%) !important;
  border-color: #0284c7 !important;
  color: #ffffff !important;
  box-shadow: 0 4px 14px 0 rgba(2, 132, 199, 0.25) !important;
}
.btn-primary:hover, .btn-submit:hover, button[type="submit"]:hover {
  transform: translateY(-1px);
  filter: brightness(1.05);
  color: #ffffff !important;
}
/* Sanitasi Dark Mode Template Lama */
.sidebar-dark, .sidebar-dark-primary, .bg-dark, .navbar-dark, .skin-black {
  background: #ffffff !important;
  color: #1e293b !important;
  border-color: #e2e8f0 !important;
}
</style>
<!-- /FK-GEMINI-THEME -->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading text-center" style="background: #0284c7; color: white; border-radius: 3px 3px 0 0;">
        <img src="logo.svg" style="height: 38px; margin-bottom: 6px;">
        <h4 style="margin: 0; font-weight: bold;">SMARTRENTAL</h4>
        <small style="color: #e0f2fe;">Portal Masuk Pelanggan Rental Mobil</small>
    </div>
                    <div class="panel-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="username" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                        </form>
                    </div>
                    <div class="panel-footer">
                      Belum punya akun? <a href="index.php?page=daftar">daftar sekarang.</a><br><div style="margin-top: 8px; padding-top: 8px; border-top: 1px dashed #cbd5e1;"><a href="admin/login.php" style="color: #0284c7; font-weight: 600;">&rarr; Masuk ke Panel Admin Pengelola</a></div>
                    <div class="text-center" style="margin-top: 15px; font-size: 12px; color: #64748b;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #0284c7; font-weight: 600; text-decoration: none;">FokusKonten</a></div>
</div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
