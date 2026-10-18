<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

session_start();
require_once "config.php";
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
    <title>SmartRental — Software Rental Sewa Mobil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <!-- Optional, Add fancyBox for media, buttons, thumbs -->
    <link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script><!-- Optional, Add mousewheel effect -->
    <script type="text/javascript" src="assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="?page=home" style="font-weight: 700; color: #0284c7; display: flex; align-items: center; gap: 8px;"><img src="logo.svg" style="height: 26px; display: inline-block;"> SmartRental</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?page=home">Beranda <span class="sr-only">(current)</span></a></li>
                        <?php if (isset($_SESSION["pelanggan"])): ?>
                          <li><a href="?page=profil">Profil</a></li>
                          <li><a href="logout.php">Logout</a></li>
                          <li><a href="#">|</a></li>
                          <li><a href="#" style="font-weight: bold; color: red;"><?= ucfirst($_SESSION["pelanggan"]["username"]) ?></a></li>
                        <?php else: ?>
                          <li><a href="?page=daftar">Daftar</a></li>
                          <li><a href="login.php">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-md-12">
              <?php include page($_PAGE); ?>
            </div>
        </div>
    
        <footer class="text-center" style="margin-top: 50px; margin-bottom: 20px; padding: 20px 0; border-top: 1px solid #e2e8f0; color: #64748b; font-size: 13px;">
            <p style="margin-bottom: 5px;"><strong>SmartRental</strong> &mdash; Solusi Manajemen Sewa & Armada Mobil Lepas Kunci</p>
            <p style="margin-bottom: 0;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">FokusKonten</a> &bull; Layanan Dukungan Teknis: +62 851-8301-1318</p>
        </footer>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
