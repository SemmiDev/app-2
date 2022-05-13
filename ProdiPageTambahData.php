<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataDosen = $dosenService->findAll();
$dataJurusan = $jurusanService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Prodi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Tambah Data Prodi</h1>
                <div>
                    <form action="ProdiProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama">
                                        Nama Prodi
                                    </label>
                                </td>
                                <td>
                                <input id="nama" name="nama" type="text" placeholder="Masukkan Nama Prodi" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="kaprodi">
                                        Kaprodi
                                    </label>
                                </td>
                                <td>
                                <select id="kaprodi" name="kaprodi" required>
                                    <option value="">Pilih Kaprodi</option>
                                    <?php foreach ($dataDosen as $dosen) : ?>
                                        <option value="<?= $dosen->id ?>"><?= $dosen->namaDepan . ' ' . $dosen->namaBelakang ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="akreditasi">
                                        Akreditasi
                                    </label>
                                </td>
                                <td>
                                <select id="akreditasi" name="akreditasi" required>
                                    <option value="">Pilih Akreditasi</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="jurusan">
                                        Jurusan
                                    </label>
                                </td>
                                <td>
                                <select id="jurusan" name="jurusan" required>
                                    <option value="">Pilih Jurusan</option>
                                    <?php foreach ($dataJurusan as $jurusan) : ?>
                                        <option value="<?= $jurusan->id ?>"><?= $jurusan->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="submit" style="margin-top: 20px;">
                                        Simpan
                                    </button>
                                </td>
                            </tr>
                    </form>
                    </table>
                </div>
            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>

    <?php include('./Layouts/Footer.php') ?>
</body>
</html>