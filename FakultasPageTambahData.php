<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Tambah Data Fakultas</h1>
                <div>
                    <form action="FakultasProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="fakultas">
                                        Nama Fakultas
                                    </label>
                                </td>
                                <td>
                                    <input id="fakultas" name="fakultas" type="text" placeholder="Masukkan Nama Fakultas" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="dekan">
                                        Dekan
                                    </label>
                                </td>
                                <td>
                                    <select id="dekan" name="dekan" required>
                                        <option value="">Pilih Dekan</option>
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->namaDepan . ' ' . $d->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="wakil_dekan_1">
                                        Wakil Dekan Bidang Akademik
                                    </label>
                                </td>
                                <td>
                                    <select id="wakil_dekan_1" name="wakil_dekan_1" required>
                                        <option value="">Pilih Wakil Dekan Bidang Akademik</option>
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->namaDepan . ' ' . $d->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="wakil_dekan_2">
                                        Wakil Dekan Bidang Administrasi Umum
                                    </label>
                                </td>
                                <td>
                                    <select id="wakil_dekan_2" name="wakil_dekan_2" required>
                                        <option value="">Pilih Wakil Dekan Bidang Administrasi Umum</option>
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->namaDepan . ' ' . $d->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <label for="wakil_dekan_3">
                                        Wakil Dekan Bidang Kemahasiswaan
                                    </label>
                                </td>
                                <td>
                                    <select id="wakil_dekan_3" name="wakil_dekan_3" required>
                                        <option value="">Pilih Wakil Dekan Bidang Kemahasiswaan</option>
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->namaDepan . ' ' . $d->namaBelakang; ?></option>
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