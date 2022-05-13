<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataRuangan = $ruanganService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ruangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Ruangan</h2>
                <?php if (isset($_COOKIE['error']) && $_COOKIE['error'] != 'empty') : ?>
                    <div id="div-error">
                        <strong>Error!</strong>
                        <span><?= $_COOKIE['error'] ?></span>
                        <span>
                            <script>
                                setTimeout(function() {
                                    document.querySelector('#div-error').remove();
                                }, 2000);
                            </script>
                        </span>
                    </div>
                <?php endif; ?>
                <?php if (isset($_COOKIE['success']) && $_COOKIE['success'] != 'empty') : ?>
                    <div class="div-success">
                        <strong>Sukses!</strong>
                        <span><?= $_COOKIE['success'] ?></span>
                        <span>
                            <script>
                                setTimeout(function() {
                                    document.querySelector('.div-success').remove();
                                }, 2000);
                            </script>
                        </span>
                    </div>
                <?php endif; ?>
                <script>
                    document.cookie = 'error=empty';
                    document.cookie = 'success=empty';
                </script>
                <div>
                    <div>
                        <a href="./RuanganPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataRuangan) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Jenis</th>
                                        <th>Kapasitas</th>
                                        <th>Lantai</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Maps</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataRuangan as $ruangan) : ?>
                                        <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ruangan->nama ?></td>
                                        <td><?= $ruangan->jenis ?></td>
                                        <td><?= $ruangan->kapasitas ?></td>
                                        <td><?= $ruangan->lantai ?></td>
                                        <td><?= $ruangan->latitude ?></td>
                                        <td><?= $ruangan->longitude ?></td>
                                        <td>
                                            <a href="https://www.google.com/maps/place/<?= $ruangan->latitude ?>,<?= $ruangan->longitude ?>" target="_blank">
                                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                                                    Lihat
                                                </button>
                                            </a>
                                        </td>
                                            <td>
                                                <div class="flex">
                                                    <a href="./RuanganPageEditData.php?id=<?= $ruangan->id ?>">
                                                        Edit
                                                    </a>
                                                    <a href="./RuanganProsesData.php?act=delete&id=<?= $ruangan->id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div id="div-error" role="alert">
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Data Ruangan Tidak Ada</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>

    <?php include('./Layouts/Footer.php') ?>
</body>

</html>