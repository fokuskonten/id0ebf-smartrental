<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');


session_start();
unset($_SESSION["pelanggan"]);
header('Location: login.php');
