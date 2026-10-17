<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

session_start();
require_once "../config.php";
if (!isset($_SESSION["admin"])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartRental — Panel Administrasi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Optional, Add fancyBox for media, buttons, thumbs -->
    <link rel="stylesheet" href="../assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../assets/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../assets/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="../assets/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="../assets/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="../assets/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script><!-- Optional, Add mousewheel effect -->
    <script type="text/javascript" src="../assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <style>
        body {
            margin-top: 40px;
        }
    </style>

<!-- FK-GEMINI-THEME -->
<style>
/* FokusKonten Gemini Clean Light Theme - Gemini Slate Steel (#475569) */
body {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 50%, #e2e8f0 100%) !important;
  color: #1e293b !important;
}
.navbar-default {
  background: #ffffff !important;
  border-color: #cbd5e1 !important;
  box-shadow: 0 4px 12px rgba(71, 85, 105, 0.08) !important;
  border-radius: 8px !important;
}
.navbar-default .navbar-brand {
  font-weight: 700 !important;
  color: #334155 !important;
}
.fk-badge-brand, .app-brand, .login-logo, .brand-logo {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 82px !important;
  height: 82px !important;
  border-radius: 50% !important;
  background: #ffffff !important;
  border: 2px solid #cbd5e1 !important;
  box-shadow: 0 8px 24px -4px rgba(71, 85, 105, 0.25) !important;
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

/* Standar Visual Muhari: Zero amateur transparent capsules -> Solid Text with Clinical Dot (●) */
.label {
  display: inline-flex !important;
  align-items: center !important;
  gap: 6px !important;
  padding: 0 !important;
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
  border-radius: 0 !important;
  font-size: 13px !important;
  font-weight: 700 !important;
  white-space: nowrap !important;
  line-height: 1.2 !important;
  text-shadow: none !important;
}

.label-success::before,
.label-danger::before,
.label-warning::before,
.label-info::before,
.label-primary::before {
  content: "●" !important;
  font-size: 9px !important;
  line-height: 1 !important;
}

.label-success {
  color: #059669 !important;
}
.label-success::before {
  color: #059669 !important;
}

.label-danger {
  color: #dc2626 !important;
}
.label-danger::before {
  color: #dc2626 !important;
}

.label-warning {
  color: #d97706 !important;
}
.label-warning::before {
  color: #d97706 !important;
}

.label-info {
  color: #2563eb !important;
}
.label-info::before {
  color: #2563eb !important;
}

.label-default {
  color: #334155 !important;
  font-family: monospace !important;
  font-weight: 700 !important;
  background: #f1f5f9 !important;
  padding: 2px 6px !important;
  border-radius: 4px !important;
  border: 1px solid #cbd5e1 !important;
}
.label-primary {
  background: #f1f5f9 !important;
  color: #1e293b !important;
  border: 1px solid #cbd5e1 !important;
}
.label-primary::before {
  color: #475569 !important;
}
.label-default {
  background: #f8fafc !important;
  color: #475569 !important;
  border: 1px solid #e2e8f0 !important;
}
.label-default::before {
  color: #64748b !important;
}

/* Standar Visual Muhari: Tombol aksi 1-baris solid (white-space: nowrap !important; tanpa piramida) */
.btn-group, .action-buttons {
  display: inline-flex !important;
  flex-direction: row !important;
  flex-wrap: nowrap !important;
  gap: 4px !important;
  white-space: nowrap !important;
}
.btn {
  white-space: nowrap !important;
  border-radius: 4px !important;
  font-weight: 500 !important;
  transition: all 0.15s ease-in-out !important;
}
.btn-primary, .btn-submit, button[type="submit"] {
  background: linear-gradient(135deg, #334155 0%, #475569 50%, #64748b 100%) !important;
  border-color: #334155 !important;
  color: #ffffff !important;
  box-shadow: 0 2px 6px rgba(51, 65, 85, 0.2) !important;
}
.btn-primary:hover, .btn-submit:hover, button[type="submit"]:hover {
  background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%) !important;
  color: #ffffff !important;
}
.panel-primary > .panel-heading {
  background: linear-gradient(135deg, #334155 0%, #475569 100%) !important;
  border-color: #334155 !important;
  color: #ffffff !important;
}
.panel-info > .panel-heading {
  background: linear-gradient(135deg, #475569 0%, #64748b 100%) !important;
  border-color: #475569 !important;
  color: #ffffff !important;
}
.panel {
  border: 1px solid #e2e8f0 !important;
  box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04) !important;
  border-radius: 8px !important;
}
.table {
  background: #ffffff !important;
  border-radius: 6px !important;
}
.table > thead > tr > th {
  background: #f1f5f9 !important;
  color: #334155 !important;
  font-weight: 600 !important;
  border-bottom: 2px solid #cbd5e1 !important;
  white-space: nowrap !important;
}
.table > tbody > tr > td {
  vertical-align: middle !important;
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
                    <a class="navbar-brand" href="?page=home" style="font-weight: 700; color: #334155; display: flex; align-items: center; gap: 8px;"><img src="../logo.svg" style="height: 26px; display: inline-block;"> SmartRental Admin</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?page=home">Beranda <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Input <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="?page=admin">Admin</a></li>
                            <li><a href="?page=jenis">Jenis</a></li>
                            <li><a href="?page=mobil">Mobil</a></li>
                            <li><a href="?page=supir">Supir</a></li>
                            <li><a href="?page=pelanggan">Pelanggan</a></li>
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="?page=lap_konfirmasi">Konfirmasi</a></li>
                            <li><a href="?page=lap_permobil">Penyewaan Permobil</a></li>
                            <li><a href="?page=lap_seringdenda">Sering Denda</a></li>
                            <li><a href="?page=lap_perperiode">Penyewaan Perperiode</a></li>
                            <li><a href="?page=lap_terlaris">Terlaris</a></li>
                            <li><a href="?page=lap_denda">Denda</a></li>
                          </ul>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="#">|</a></li>
                        <li><a href="#" style="font-weight: bold; color: red;"><?= ucfirst($_SESSION["admin"]["username"]) ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-md-12">
              <?php include adminPage($_ADMINPAGE); ?>
            </div>
        </div>
    
        <footer class="text-center" style="margin-top: 50px; margin-bottom: 20px; padding: 20px 0; border-top: 1px solid #e2e8f0; color: #64748b; font-size: 13px;">
            <p style="margin-bottom: 5px;"><strong>SmartRental Admin Panel</strong> &mdash; Sistem Pengelolaan Rental & Denda Keterlambatan</p>
            <p style="margin-bottom: 0;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">FokusKonten</a> &bull; Layanan Dukungan Teknis: +62 851-8301-1318</p>
        </footer>
    </div>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>