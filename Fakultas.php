<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataFakultas = $fakultasService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fakultas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Fakultas</h2>
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
                        <a href="./FakultasPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataFakultas) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Dekan</th>
                                        <th>Nama Wakil Dekan 1 (Bidang Akademik) </th>
                                        <th>Nama Wakil Dekan 2 (Bidang Administrasi UMum) </th>
                                        <th>Nama Wakil Dekan 3 (Bidang Kemahasiswaan) </th>
                                        <th>Total Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataFakultas as $fakultas) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $fakultas->nama ?></td>

                                            <?php if (!is_null($fakultas->dekan)) { ?>
                                                <td><?= $fakultas->dekan->namaDepan . ' ' . $fakultas->dekan->namaBelakang ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>

                                            <?php if (!is_null($fakultas->wakilDekan1)) { ?>
                                                <td><?= $fakultas->wakilDekan1->namaDepan . ' ' . $fakultas->wakilDekan1->namaBelakang ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>

                                            <?php if (!is_null($fakultas->wakilDekan2)) { ?>
                                                <td><?= $fakultas->wakilDekan2->namaDepan . ' ' . $fakultas->wakilDekan2->namaBelakang ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>

                                            <?php if (!is_null($fakultas->wakilDekan3)) { ?>
                                                <td><?= $fakultas->wakilDekan3->namaDepan . ' ' . $fakultas->wakilDekan3->namaBelakang ?></td>
                                            <?php } else { ?>
                                                <td>-</td>
                                            <?php } ?>

                                            <td><?= $jurusanService->totalJurusanInFakultasId($fakultas->id) ?></td>
                                            <td>
                                                <div class="flex">
                                                    <a href="./FakultasPageEditData.php?id=<?= $fakultas->id ?>">
                                                        Edit
                                                    </a>
                                                    <a href="./FakultasProsesData.php?act=delete&id=<?= $fakultas->id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div id="div-error" role="alert">
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Data Mahasiswa Tidak Ada</span>
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