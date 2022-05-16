<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataDosen = $dosenService->findAll();
$dataMataKuliah = $mataKuliahService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Mengajar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Tambah Data Mengajr</h1>
                <div>
                    <form action="MengajarProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="idDosen">
                                        Dosen
                                    </label>
                                </td>
                                <td>
                                    <select id="idDosen" name="idDosen">
                                        <option value="">Pilih Dosen</option>
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->namaDepan . ' ' . $d->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="idMataKuliah">
                                        Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <select id="idMataKuliah" name="idMataKuliah">
                                        <option value="">Pilih Mata Kuliah</option>
                                        <?php foreach ($dataMataKuliah as $m) : ?>
                                            <option value="<?= $m->id; ?>"><?= $m->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="hari">
                                        Hari
                                    </label>
                                </td>
                                <td>
                                    <select id="hari" name="hari">
                                        <option value="">Pilih Hari</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="jamMulai">
                                        Jam Mulai
                                    </label>
                                </td>
                                <td>
                                    <input id="jamMulai" name="jamMulai" type="time" placeholder="Masukkan Jam Mulai">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="jamSelesai">
                                        Jam Selesai
                                    </label>
                                </td>
                                <td>
                                    <input id="jamSelesai" name="jamSelesai" type="time" placeholder="Masukkan Jam Selesai">
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