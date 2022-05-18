<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("mahasiswa");
$current = $sessionService->current();
$dataEnrollMataKuliah = $enrollMataKuliahService->findAllMahasiswa($current->email);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Enroll Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Enroll Mata Kuliah</h2>
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
                        <a href="./M_TambahEnrollMataKuliah.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataEnrollMataKuliah) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM Mahasiswa</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataEnrollMataKuliah as $enroll) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $enroll->mahasiswa->nim ?></td>
                                            <td><?= $enroll->mahasiswa->namaDepan . ' ' . $enroll->mahasiswa->namaBelakang ?></td>
                                            <td><?= $enroll->mataKuliah->kode ?></td>
                                            <td><?= $enroll->mataKuliah->nama ?></td>
                                            <td><?= $enroll->semester ?></td>
                                            <td><?= $enroll->tahunAjaran ?></td>

                                            <?php if (strlen($enroll->nilai) != 0) { ?>
                                                <td><?= $enroll->nilai ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>
                                            <td>
                                                <div>
                                                    <a href="./EnrollMataKuliahPageEditData.php?id=<?= $enroll->id ?>">
                                                        Edit
                                                    </a>
                                                    <a href="./EnrollMataKuliahProsesData.php?act=delete2&id=<?= $enroll->id ?>">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div id="div-error" role="alert">
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Anda belum ada mengambil mata kuliah</span>
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