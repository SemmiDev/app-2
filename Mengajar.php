<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMengajar = $mengajarService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mengajar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Mengajar</h2>
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
                        <a href="./MengajarPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataMengajar) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Kuliah</th>
                                        <th>Kode Kuliah</th>
                                        <th>Hari</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Dosen Pengajar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataMengajar as $m) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $m->mataKuliah->nama ?></td>
                                            <td><?= $m->mataKuliah->kode ?></td>
                                            <td><?= $m->hari ?></td>
                                            <td><?= $m->jamMulai ?></td>
                                            <td><?= $m->jamSelesai ?></td>
                                            <td><?= $m->dosen->namaDepan . ' ' . $m->dosen->namaBelakang ?></td>

                                            <td>
                                                <div>
                                                    <a href="./MengajarPageEditData.php?id=<?= $m->id ?>">
                                                        Edit
                                                    </a>
                                                    <a href="./MengajarProsesData.php?act=delete&id=<?= $m->id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div id="div-error" role="alert">
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Data Mengajar Tidak Ada</span>
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