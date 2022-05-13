<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dosen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Dosen</h2>
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
                        <a href="./DosenPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataDosen) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telp</th>
                                        <th>No HP</th>
                                        <th>Golongan</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataDosen as $dosen) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dosen->nip ?></td>
                                            <td><?= $dosen->namaDepan ?></td>
                                            <td><?= $dosen->namaBelakang ?></td>
                                            <td><?= $dosen->email ?></td>
                                            <td><?= $dosen->jenisKelamin ?></td>
                                            <td><?= $dosen->noTelp ?></td>
                                            <td><?= $dosen->noHP ?></td>
                                            <td><?= $dosen->golonganPNS ?></td>
                                            <td><?= $dosen->status ?></td>
                                            <td><?= $dosen->alamat ?></td>
                                            <td>
                                                <div class="flex">
                                                    <a href="./DosenPageEditData.php?id=<?= $dosen->id ?>">
                                                        Edit
                                                    </a>
                                                    <a href="./DosenProsesData.php?act=delete&id=<?= $dosen->id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div id="div-error" role="alert">
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Data Dosen Tidak Ada</span>
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