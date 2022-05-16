<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataJurusan = $jurusanService->findAll();
$dataDosen = $dosenService->findAll();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Tambah Data Mata Kuliah</h1>
                <div>
                    <form action="MataKuliahProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama_mata_kuliah">
                                        Nama Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <input id="nama_mata_kuliah" name="nama_mata_kuliah" type="text" placeholder="Masukkan Nama Mata Kuliah" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="kode_mata_kuliah">
                                        Kode Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <input id="kode_mata_kuliah" name="kode_mata_kuliah" type="text" placeholder="Masukkan Kode Mata Kuliah" required>
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
                                    <label for="sks">
                                        SKS
                                    </label>
                                </td>
                                <td>
                                    <input id="sks" name="sks" type="number" placeholder="Masukkan SKS" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="slot">
                                        Slot
                                    </label>
                                </td>
                                <td>
                                    <input id="slot" name="slot" type="number" placeholder="Masukkan Slot" required>
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
                                    <input id="sisa_slot" name="sisa_slot" type="number" placeholder="Masukkan Sisa Slot" required>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
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
                                            <option value="<?php echo $dosen->id; ?>"><?php echo $dosen->namaDepan . ' ' . $dosen->namaBelakang ?></option>
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
                                            <option value="<?php echo $jurusan->id; ?>"><?php echo $jurusan->nama; ?></option>
                                        <?php } ?>
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