<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../config.php";
    $sql = "SELECT * FROM admin WHERE username='$_POST[username]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
              $_SESSION["admin"]["is_logged"] = true;
              $_SESSION["admin"]["username"] = $data["username"];
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
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="../icon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../icon-16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../icon-128.png">
    <link rel="manifest" href="../manifest.json">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — SmartRental</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
.btn-primary, .btn-info, .btn-submit, button[type="submit"] {
  background: linear-gradient(135deg, #334155 0%, #475569 50%, #64748b 100%) !important;
  border-color: #334155 !important;
  color: #ffffff !important;
  box-shadow: 0 4px 14px 0 rgba(71, 85, 105, 0.25) !important;
}
.btn-primary:hover, .btn-info:hover, .btn-submit:hover, button[type="submit"]:hover {
  background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%) !important;
  color: #ffffff !important;
}
.panel {
  border: 1px solid #e2e8f0 !important;
  box-shadow: 0 8px 24px -4px rgba(71, 85, 105, 0.15) !important;
  border-radius: 8px !important;
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
                    <div class="panel-heading text-center" style="background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%); color: #1e293b; border-bottom: 1px solid #cbd5e1; border-radius: 8px 8px 0 0;">
        <img src="../logo.svg" style="height: 38px; margin-bottom: 6px;">
        <h4 style="margin: 0; font-weight: bold; color: #334155;">SMARTRENTAL ADMIN</h4>
        <small style="color: #64748b;">Panel Pengelola Sistem Rental Mobil</small>
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
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="panel-footer text-center" style="font-size: 12px; background: #f8fafc; color: #64748b;">
                        <span style="font-size: 12px; color: #64748b;">Powered by <a href="https://fokuskonten.my.id" target="_blank" style="color: #475569; font-weight: 600; text-decoration: none;">FokusKonten</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
