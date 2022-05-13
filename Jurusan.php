<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataJurusan = $jurusanService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Jurusan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Jurusan</h2>
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
                        <a href="./JurusanPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataJurusan) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jurusan</th>
                                        <th>Kajur</th>
                                        <th>Akreditasi</th>
                                        <th>Jenjang</th>
                                        <th>Fakultas</th>
                                        <th>Total Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataJurusan as $jurusan) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $jurusan->nama ?></td>

                                            <?php if (!is_null($jurusan->kajur)) { ?>
                                                <td><?= $jurusan->kajur->namaDepan . ' ' . $jurusan->kajur->namaBelakang ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>

                                            <td><?= $jurusan->akreditasi ?></td>
                                            <td><?= $jurusan->jenjang ?></td>

                                            <?php if (!is_null($jurusan->fakultas)) { ?>
                                                <td><?= $jurusan->fakultas->nama ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>

                                            <td><?= $jurusanService->totalMahasiswaInJurusanId($jurusan->id)  . ' orang' ?></td>
                                            <td>
                                                <div class="flex">
                                                    <a href="./JurusanPageEditData.php?id=<?= $jurusan->id ?>" class="bg-green-500 hover:bg-green-700 text-slate-50 font-bold py-2 px-3 rounded mr-2">
                                                        Edit
                                                    </a>
                                                    <a href="./JurusanProsesData.php?act=delete&id=<?= $jurusan->id ?>" class="bg-red-500 hover:bg-red-700 text-slate-50 font-bold py-2 px-3 rounded">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div id="div-error" role="alert">
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Data Jurusan Tidak Ada</span>
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