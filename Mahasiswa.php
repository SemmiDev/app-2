<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$q = trim($_GET['q']);
$pageID = $_GET['page_id'] ?? 1;

if (isset($_GET['page_id'])) {
    $pageID = $_GET['page_id'];
    $limit = 25;
    $offset = ($pageID - 1) * $limit;
    $dataMhs = $mahasiswaService->findByPaginate($limit,$offset);
}else {
    $limit = 25;
    $offset = ($pageID - 1) * $limit;
    $dataMhs = $mahasiswaService->findByPaginate($limit, $offset);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h2>Data Mahasiswa</h2>
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
                        <a href="./MahasiswaPageTambahData.php">
                            <button>Tambah Data</button>
                        </a>
                        <a href="./MahasiswaPageUpload.php">
                            <button>Upload File CSV</button>
                        </a><br>
                        <br>
                        <div>
                            <form action="./Mahasiswa.php" method="get">
                                <input type="text" name="q" placeholder="Cari... ">
                                <input type="submit" style="display: none;">
                            </form>
                        </div>
                        <br>
                    </div>
                    <?php if ($q != '') { ?>
                        <?php
                        $dataMhs = $mahasiswaService->search($q);
                        if (count($dataMhs) != 0) { ?>
                        <p>Ditemukan <?= count($dataMhs) ?> data mahasiswa yg cocok</p>
                        <a href="Mahasiswa.php">Kembali</a>
                        <br>
                        <br>
                            <div class="container">
                                <table class="my-table" border="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Jenjang</th>
                                            <th>Tanggal Lahir</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Angkatan</th>
                                            <th>Jalur Masuk</th>
                                            <th>Total SKS</th>
                                            <th>Semester</th>
                                            <th>Jurusan</th>
                                            <th>Prodi</th>
                                            <th>Dosen PA</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($dataMhs as $mhs) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $mhs->nim ?></td>
                                                <td><?= $mhs->namaDepan ?></td>
                                                <td><?= $mhs->namaBelakang ?></td>
                                                <td><?= $mhs->email ?></td>
                                                <td><?= $mhs->jenisKelamin ?></td>
                                                <td><?= $mhs->agama ?></td>
                                                <td><?= $mhs->jenjang ?></td>
                                                <td><?= $mhs->tanggalLahir ?></td>
                                                <td><?= $mhs->noHP ?></td>
                                                <td><?= $mhs->alamat ?></td>
                                                <td><?= $mhs->status ?></td>
                                                <td><?= $mhs->angkatan ?></td>
                                                <td><?= $mhs->jalurMasuk ?></td>
                                                <td><?= $mhs->totalSKS ?></td>
                                                <td><?= $mhs->semester ?></td>

                                                <?php if (!is_null($mhs->jurusan)) { ?>
                                                    <td><?= $mhs->jurusan->nama ?></td>
                                                <?php } else { ?>
                                                    <td>-</td>
                                                <?php } ?>

                                                <td>
                                                    <div>
                                                        <?php if (!is_null($mhs->prodi)) { ?>
                                                            <span><?= $mhs->prodi->nama ?></span>
                                                        <?php } else { ?>
                                                            <span>-</span>
                                                        <?php } ?>
                                                    </div>

                                                    <div>
                                                        <a href="./MahasiswaPageEditProdiData.php?id=<?= $mhs->id ?>&jurusan_id=<?= $mhs->jurusan->id ?>" style="font-weight: bold">
                                                            Prodi
                                                        </a>
                                                    </div>
                                                </td>

                                                <?php if (!is_null($mhs->dosenPA)) { ?>
                                                    <td><?= $mhs->dosenPA->namaDepan . ' ' . $mhs->dosenPA->namaBelakang ?></td>
                                                <?php } else { ?>
                                                    <td>
                                                        <div>
                                                            <span>-</span>
                                                        </div>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <a href="./MahasiswaPageEditData.php?id=<?= $mhs->id ?>" style="font-weight: bold">
                                                        Edit
                                                    </a> |
                                                    <a href="./MahasiswaProsesData.php?act=delete&id=<?= $mhs->id ?>" style="font-weight: bold">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <p>Tidak ada data yang cocok</p>
                            <a href="Mahasiswa.php">Kembali</a>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if (count($dataMhs) == 0) { ?>
                            <div id="div-error" role="alert">
                                <span style="color: #5aa27c; font-weight: bolder">Ups! Data Mahasiswa Tidak Ada</span>
                            </div>
                            <a href="Mahasiswa.php">Kembali</a>
                        <?php } else { ?>
                            <div class="container">
                                <table class="my-table" border="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Jenjang</th>
                                            <th>Tanggal Lahir</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Angkatan</th>
                                            <th>Jalur Masuk</th>
                                            <th>Total SKS</th>
                                            <th>Semester</th>
                                            <th>Jurusan</th>
                                            <th>Prodi</th>
                                            <th>Dosen PA</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($dataMhs as $mhs) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $mhs->nim ?></td>
                                                <td><?= $mhs->namaDepan ?></td>
                                                <td><?= $mhs->namaBelakang ?></td>
                                                <td><?= $mhs->email ?></td>
                                                <td><?= $mhs->jenisKelamin ?></td>
                                                <td><?= $mhs->agama ?></td>
                                                <td><?= $mhs->jenjang ?></td>
                                                <td><?= $mhs->tanggalLahir ?></td>
                                                <td><?= $mhs->noHP ?></td>
                                                <td><?= $mhs->alamat ?></td>
                                                <td><?= $mhs->status ?></td>
                                                <td><?= $mhs->angkatan ?></td>
                                                <td><?= $mhs->jalurMasuk ?></td>
                                                <td><?= $mhs->totalSKS ?></td>
                                                <td><?= $mhs->semester ?></td>

                                                <?php if (!is_null($mhs->jurusan)) { ?>
                                                    <td><?= $mhs->jurusan->nama ?></td>
                                                <?php } else { ?>
                                                    <td>-</td>
                                                <?php } ?>

                                                <td>
                                                    <div>
                                                        <?php if (!is_null($mhs->prodi)) { ?>
                                                            <span><?= $mhs->prodi->nama ?></span>
                                                        <?php } else { ?>
                                                            <span>-</span>
                                                        <?php } ?>
                                                    </div>

                                                    <div>
                                                        <a href="./MahasiswaPageEditProdiData.php?id=<?= $mhs->id ?>&jurusan_id=<?= $mhs->jurusan->id ?>" style="font-weight: bold">
                                                            Prodi
                                                        </a>
                                                    </div>
                                                </td>

                                                <?php if (!is_null($mhs->dosenPA)) { ?>
                                                    <td><?= $mhs->dosenPA->namaDepan . ' ' . $mhs->dosenPA->namaBelakang ?></td>
                                                <?php } else { ?>
                                                    <td>
                                                        <div>
                                                            <span>-</span>
                                                        </div>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <a href="./MahasiswaPageEditData.php?id=<?= $mhs->id ?>" style="font-weight: bold">
                                                        Edit
                                                    </a> |
                                                    <a href="./MahasiswaProsesData.php?act=delete&id=<?= $mhs->id ?>" style="font-weight: bold">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php if ($pageID != 1) { ?>
                                    <a href="Mahasiswa.php?page_id=<?= --$pageID ?>" style="text-decoration: none; font-weight: bolder; font-size: 35px">&larr;</a> 
                                <?php } ?>
                                <?php 
                                    $pageID = $_GET['page_id'] ?? 1;
                                    $pageID += 1;
                                    $limit = 25;
                                    $offset = ($pageID - 1) * $limit;
                                    $dataMhs = $mahasiswaService->findByPaginate($limit,$offset);
                                    if (count($dataMhs) != 0) { ?>
                                        <a href="Mahasiswa.php?page_id=<?= $pageID ?>" style="text-decoration: none; font-weight: bolder; font-size: 35px">&rarr;</a> 
                                    <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>

    <?php include('./Layouts/Footer.php') ?>
</body>

</html>