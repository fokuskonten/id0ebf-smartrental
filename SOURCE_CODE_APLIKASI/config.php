<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');
if (function_exists('mysqli_report')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}

date_default_timezone_set('Asia/Jakarta');
$now = date("Y-m-d H:i:s");
/**
 * Database connection setup
 */
if (!$connection = new Mysqli("127.0.0.1", "root", "", "mobil")) {
  echo "<h3>ERROR: Koneksi database gagal!</h3>";
}
/**
 * Page initialize
 */
if (isset($_GET["page"])) {
  $_PAGE = $_GET["page"];
  $_ADMINPAGE = $_GET["page"];
} else {
  $_PAGE = "home";
  $_ADMINPAGE = "home";
}
/**
 * Page setup
 * @param page
 * @return page filename
 */
function page($page) {
  return "pelanggan/" . $page . ".php";
}
/**
 * Page setup
 * @param page
 * @return page filename
 */
function adminPage($page) {
  return "page/" . $page . ".php";
}

/**
 * Alert notification
 * @param message, redirection
 * @return alert notify
 */
function alert($msg, $to = null) {
  $to = ($to) ? $to : $_SERVER["PHP_SELF"];
  return "<script>alert('{$msg}');window.location='{$to}';</script>";
}

// Update otomatis
$query = $connection->query("SELECT a.id_mobil, a.id_transaksi, (DATEDIFF(NOW(), a.tgl_ambil)) AS tgl FROM transaksi a WHERE a.status='0'");
if ($query) {
  while ($data = $query->fetch_assoc()) {
    if ($data["tgl"] >= 0) {
      $connection->query("UPDATE mobil SET status='0' WHERE id_mobil=" . intval($data['id_mobil']));
      $q = $connection->query("SELECT id_supir FROM detail_transaksi WHERE id_transaksi=" . intval($data['id_transaksi']));
      if ($q && $q->num_rows) {
        $supirRow = $q->fetch_assoc();
        if (!empty($supirRow['id_supir'])) {
          $connection->query("UPDATE supir SET status='0' WHERE id_supir=" . intval($supirRow['id_supir']));
        }
      }
    }
  }
}

// Pembatalan otomatis
$query = $connection->query("SELECT a.jatuh_tempo, a.id_transaksi, a.id_mobil, (TIMESTAMPDIFF(HOUR, a.tgl_sewa, NOW())) AS tempo FROM transaksi a WHERE a.konfirmasi='0'");
if ($query) {
  while ($data = $query->fetch_assoc()) {
    if ($data["tempo"] > 3) {
      $connection->query("UPDATE transaksi SET pembatalan='1' WHERE id_transaksi=" . intval($data['id_transaksi']));
      $connection->query("UPDATE mobil SET status='1' WHERE id_mobil=" . intval($data['id_mobil']));
      $q = $connection->query("SELECT id_supir FROM detail_transaksi WHERE id_transaksi=" . intval($data['id_transaksi']));
      if ($q && $q->num_rows) {
        $supirRow = $q->fetch_assoc();
        if (!empty($supirRow['id_supir'])) {
          @$connection->query("UPDATE supir SET status='1' WHERE id_supir=" . intval($supirRow['id_supir']));
        }
        @$connection->query("DELETE FROM detail_transaksi WHERE id_transaksi=" . intval($data['id_transaksi']));
      }
    }
  }
}

// Perhitungan denda otomatis CONTOH : ADDDATE('2017-01-01', INTERVAL 1 DAY)
$sql = "SELECT
          a.id_transaksi,
          (
            TIMESTAMPDIFF(
              HOUR,
              ADDDATE(a.tgl_ambil, INTERVAL a.lama DAY),
              a.tgl_kembali
            )
          ) AS terlambat,
          35000 * (TIMESTAMPDIFF(HOUR, ADDDATE(a.tgl_ambil, INTERVAL a.lama DAY), a.tgl_kembali)) AS denda
        FROM transaksi a
        WHERE a.tgl_kembali IS NOT NULL AND a.tgl_kembali <> ''";
$query = $connection->query($sql);
if ($query) {
  while ($a = $query->fetch_assoc()) {
    if (!empty($a["denda"]) && $a["denda"] > 0) {
      $connection->query("UPDATE transaksi SET denda=" . intval($a['denda']) . " WHERE id_transaksi=" . intval($a['id_transaksi']));
    }
  }
}
