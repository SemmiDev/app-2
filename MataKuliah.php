<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");


$dataMataKuliah = $mataKuliahService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Mata Kuliah</h2>
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
                        <a href="./MataKuliahPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataMataKuliah) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Kode</th>
                                        <th>SKS</th>
                                        <th>Slot</th>
                                        <th>Sisa Slot</th>
                                        <th>Jurusan</th>
                                        <th>Semester</th>
                                        <th>Dosen Pengampu</th>
                                        <th>Total Mahasiswa</th>
                                        <th>Dosen Pengajar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataMataKuliah as $mataKuliah) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $mataKuliah->nama ?></td>
                                            <td><?= $mataKuliah->kode ?></td>
                                            <td><?= $mataKuliah->sks ?></td>
                                            <td><?= $mataKuliah->slot ?></td>
                                            <td><?= $mataKuliah->sisaSlot ?></td>
                                            <td><?= $mataKuliah->jurusan->nama ?></td>
                                            <td><?= $mataKuliah->semester ?></td>
                                            <td><?= $mataKuliah->dosenPengampu->namaDepan . ' ' . $mataKuliah->dosenPengampu->namaBelakang ?></td>
                                            <td><?= $mataKuliahService->totalMahasiswaInMataKuliahId($mataKuliah->id) . ' orang' ?></td>
                                            <td>
                                                <?php foreach ($mataKuliahService->dosenPengajar($mataKuliah->id) as $dosenPengajar) : ?>
                                                    <li class="ml-2">
                                                        <a href="./DosenPage.php?id=<?= $dosenPengajar->namaDepan ?>" class="text-blue-500 hover:text-blue-700">
                                                            <?= $dosenPengajar->namaDepan . ' ' . $dosenPengajar->namaBelakang ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </td>

                                            <td>
                                                <div class="flex">
                                                    <a href="./MataKuliahPageEditData.php?id=<?= $mataKuliah->id ?>">
                                                        Edit
                                                    </a>
                                                    <a href="./MataKuliahProsesData.php?act=delete&id=<?= $mataKuliah->id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Delete</a>
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