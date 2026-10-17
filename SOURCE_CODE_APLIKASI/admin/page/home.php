<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

// Query agregat riil
$qMobil = $connection->query("SELECT COUNT(*) as total, SUM(CASE WHEN status='1' THEN 1 ELSE 0 END) as tersedia FROM mobil");
$rMobil = $qMobil->fetch_assoc();

$qJenis = $connection->query("SELECT COUNT(*) as total FROM jenis");
$rJenis = $qJenis->fetch_assoc();

$qSupir = $connection->query("SELECT COUNT(*) as total, SUM(CASE WHEN status='1' THEN 1 ELSE 0 END) as siaga FROM supir");
$rSupir = $qSupir->fetch_assoc();

$qPelanggan = $connection->query("SELECT COUNT(*) as total FROM pelanggan");
$rPelanggan = $qPelanggan->fetch_assoc();
?>

<div class="page-header" style="margin-top: 10px; border-bottom: 2px solid #e2e8f0;">
    <h2 style="font-weight: 700; color: #0f172a; margin-bottom: 5px;">Dashboard Manajemen Rental <small style="display: block; font-size: 14px; color: #64748b; margin-top: 6px;">Ringkasan operasional armada kendaraan, status penyewaan, dan ketersediaan supir</small></h2>
</div>

<!-- 4 KARTU STATISTIK RINGKAS -->
<div class="row" style="margin-bottom: 25px;">
    <!-- KARTU 1: ARMADA MOBIL -->
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-primary" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 8px;">
            <div class="panel-heading" style="background: linear-gradient(135deg, #334155 0%, #475569 100%); border: none; padding: 15px 20px;">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-bed" style="font-size: 40px; color: #cbd5e1;"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 28px; font-weight: bold;"><?= (int)$rMobil['total'] ?></div>
                        <div style="font-size: 12px; color: #f1f5f9;">Total Armada Mobil</div>
                    </div>
                </div>
            </div>
            <a href="?page=mobil" style="color: #334155; text-decoration: none;">
                <div class="panel-footer" style="background: #f8fafc; font-size: 12px; font-weight: 600;">
                    <span class="pull-left"><?= (int)$rMobil['tersedia'] ?> Unit Siap Sewa</span>
                    <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- KARTU 2: KATEGORI / JENIS -->
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-success" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 8px;">
            <div class="panel-heading" style="background: #059669; border: none; padding: 15px 20px;">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-tags" style="font-size: 40px; color: #a7f3d0;"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 28px; font-weight: bold;"><?= (int)$rJenis['total'] ?></div>
                        <div style="font-size: 12px; color: #d1fae5;">Kategori Kendaraan</div>
                    </div>
                </div>
            </div>
            <a href="?page=jenis" style="color: #047857; text-decoration: none;">
                <div class="panel-footer" style="background: #f8fafc; font-size: 12px; font-weight: 600;">
                    <span class="pull-left">Kelola Kategori</span>
                    <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- KARTU 3: SUPIR SIAGA -->
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-warning" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 8px;">
            <div class="panel-heading" style="background: #d97706; border: none; padding: 15px 20px;">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-user" style="font-size: 40px; color: #fde68a;"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 28px; font-weight: bold;"><?= (int)$rSupir['total'] ?></div>
                        <div style="font-size: 12px; color: #fef3c7;">Supir Terdaftar</div>
                    </div>
                </div>
            </div>
            <a href="?page=supir" style="color: #b45309; text-decoration: none;">
                <div class="panel-footer" style="background: #f8fafc; font-size: 12px; font-weight: 600;">
                    <span class="pull-left"><?= (int)$rSupir['siaga'] ?> Supir Siaga</span>
                    <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- KARTU 4: PELANGGAN -->
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-info" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 8px;">
            <div class="panel-heading" style="background: #4f46e5; border: none; padding: 15px 20px;">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 40px; color: #c7d2fe;"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 28px; font-weight: bold;"><?= (int)$rPelanggan['total'] ?></div>
                        <div style="font-size: 12px; color: #e0e7ff;">Pelanggan Terdaftar</div>
                    </div>
                </div>
            </div>
            <a href="?page=pelanggan" style="color: #4338ca; text-decoration: none;">
                <div class="panel-footer" style="background: #f8fafc; font-size: 12px; font-weight: 600;">
                    <span class="pull-left">Data Pelanggan</span>
                    <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- TABEL STATUS ARMADA MOBIL -->
<div class="panel panel-default" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 8px;">
    <div class="panel-heading" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 12px 18px; display: flex; justify-content: space-between; align-items: center;">
        <h4 style="margin: 0; font-weight: bold; color: #1e293b;"><span class="glyphicon glyphicon-th-list"></span> Status Kesiapan Armada Kendaraan</h4>
        <a href="?page=mobil" class="btn btn-primary btn-xs" style="padding: 5px 12px;">+ Tambah / Kelola Mobil</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped" style="margin-bottom: 0;">
            <thead>
                <tr style="background: #f1f5f9; color: #475569; font-size: 13px;">
                    <th style="width: 50px;" class="text-center">No</th>
                    <th>Nama Kendaraan</th>
                    <th>Merk & Kategori</th>
                    <th>No. Plat Polisi</th>
                    <th>Tarif / Hari</th>
                    <th class="text-center">Status Sewa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $qList = $connection->query("SELECT m.*, j.nama as nama_jenis FROM mobil m JOIN jenis j USING(id_jenis) ORDER BY m.id_mobil ASC");
                while ($m = $qList->fetch_assoc()):
                ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><strong><?= htmlspecialchars($m['nama_mobil']) ?></strong></td>
                    <td><?= htmlspecialchars($m['merk']) ?> (<?= htmlspecialchars($m['nama_jenis']) ?>)</td>
                    <td><span class="label label-default" style="font-family: monospace; font-size: 12px;"><?= htmlspecialchars($m['no_mobil']) ?></span></td>
                    <td>Rp <?= number_format($m['harga'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <?php if ($m['status'] == '1'): ?>
                            <span class="label label-success">Tersedia (Siaga)</span>
                        <?php else: ?>
                            <span class="label label-danger">Sedang Disewa</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
