<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMhs = $mahasiswaService->findAll();

$id = $_GET['id'];
$dataMataKuliah = $mataKuliahService->findById($id);
$dataJurusan = $jurusanService->findAll();
$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Mata Kuliah </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Edit Data Mata Kuliah </h1>
                <div>
                    <form action="MataKuliahProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama_mata_kuliah">
                                        Nama Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <input id="nama_mata_kuliah" name="nama_mata_kuliah" type="text" placeholder="Masukkan Nama Mata Kuliah" value="<?= $dataMataKuliah->nama ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="kode_mata_kuliah">
                                        Kode Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <input id="kode_mata_kuliah" name="kode_mata_kuliah" type="text" placeholder="Masukkan Kode Mata Kuliah" value="<?= $dataMataKuliah->kode ?>" required>
                                    <button class="bg-pink-500 hover:bg-pink-700 text-white text-sm font-semibold py-2 px-3 mt-2 rounded focus:outline-none focus:shadow-outline" type="button" onclick="document.getElementById('kode_mata_kuliah').value = generateCode(10)">Generate</button>
                                    <script>
                                        function generateCode(n = 4) {
                                            var text = "";
                                            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                                            for (var i = 0; i < n; i++)
                                                text += possible.charAt(Math.floor(Math.random() * possible.length));
                                            return text;
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="semester">
                                        Semester
                                    </label>
                                </td>
                                <td>
                                    <select id="semester" name="semester" required>
                                        <option value="">Pilih Semester</option>
                                        <option value="1" <?php if ($dataMataKuliah->semester == 1) echo 'selected' ?>>1</option>
                                        <option value="2" <?php if ($dataMataKuliah->semester == 2) echo 'selected' ?>>2</option>
                                        <option value="3" <?php if ($dataMataKuliah->semester == 3) echo 'selected' ?>>3</option>
                                        <option value="4" <?php if ($dataMataKuliah->semester == 4) echo 'selected' ?>>4</option>
                                        <option value="5" <?php if ($dataMataKuliah->semester == 5) echo 'selected' ?>>5</option>
                                        <option value="6" <?php if ($dataMataKuliah->semester == 6) echo 'selected' ?>>6</option>
                                        <option value="7" <?php if ($dataMataKuliah->semester == 7) echo 'selected' ?>>7</option>
                                        <option value="8" <?php if ($dataMataKuliah->semester == 8) echo 'selected' ?>>8</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="sks">
                                        SKS
                                    </label>
                                </td>
                                <td>
                                    <input id="sks" name="sks" type="number" placeholder="Masukkan SKS" value="<?= $dataMataKuliah->sks ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="slot">
                                        Slot
                                    </label>
                                </td>
                                <td>
                                    <input id="slot" name="slot" type="number" placeholder="Masukkan Slot" value="<?= $dataMataKuliah->slot ?>" required>
                                    <script>
                                        document.getElementById('slot').onchange = function() {
                                            document.getElementById('sisa_slot').value = this.value;
                                        }
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="sisa_slot">
                                        Sisa Slot
                                    </label>
                                </td>
                                <td>
                                    <input id="sisa_slot" name="sisa_slot" type="number" placeholder="Masukkan Sisa Slot" value="<?= $dataMataKuliah->sisaSlot ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="dosen_pengampu">
                                        Dosen Pengampu
                                    </label>
                                </td>
                                <td>
                                    <select id="dosen_pengampu" name="dosen_pengampu" required>
                                        <option value="">Pilih Dosen Pengampu</option>
                                        <?php foreach ($dataDosen as $dosen) { ?>
                                            <option value="<?= $dosen->id ?>" <?php if ($dataMataKuliah->idDosenPengampu == $dosen->id) echo 'selected' ?>><?= $dosen->namaDepan . ' ' . $dosen->namaBelakang ?></option>
                                        <?php } ?>
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
                                        <?php foreach ($dataJurusan as $jurusan) { ?>
                                            <option value="<?= $jurusan->id ?>" <?php if ($dataMataKuliah->idJurusan == $jurusan->id) echo 'selected' ?>><?= $jurusan->nama ?></option>
                                        <?php } ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="submit" style="margin-top: 20px;">
                                        Simpan Perubahan
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