<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataProdi = $prodiService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Prodi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Prodi</h2>
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
                        <a href="./ProdiPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <br>
                        <br>
                    </div>
                    <?php
                    if (count($dataProdi) != 0) { ?>
                        <div class="container">
                            <table class="my-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Prodi</th>
                                        <th>Kaprodi</th>
                                        <th>Akreditasi</th>
                                        <th>Jurusan</th>
                                        <th>Total Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                            <?php foreach ($dataProdi as $prodi) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $prodi->nama ?></td>

                                    <?php if (!is_null($prodi->kaprodi)) { ?> 
                                        <td><?= $prodi->kaprodi->namaDepan . ' ' . $prodi->kaprodi->namaBelakang ?></td>
                                    <?php } else { ?>
                                        <td>-</td>
                                    <?php } ?>
                                    
                                    <td><?= $prodi->akreditasi ?></td>
                                    
                                    <?php if (!is_null($prodi->jurusan)) { ?> 
                                        <td><?= $prodi->jurusan->nama ?></td>
                                    <?php } else { ?>
                                        <td>-</td>
                                    <?php } ?>                                     
                                    <td><?= $prodiService->totalMahasiswaInProdiId($prodi->id) ?></td>
                                    
                                    <td>
                                        <div>
                                            <a href="./ProdiPageEditData.php?id=<?= $prodi->id ?>">
                                                Edit
                                            </a>
                                            <a href="./ProdiProsesData.php?act=delete&id=<?= $prodi->id ?>">
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
                        <div>
                            <span style="color: #5aa27c; font-weight: bolder">Ups! Data Prodi Tidak Ada</span>
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