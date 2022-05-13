<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMhs = $mahasiswaService->findAll();

$id = $_GET['id'];
$dataRuangan = $ruanganService->findById($id);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Ruangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Edit Data Ruangan</h1>
                <div>
                    <form action="RuanganProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama">
                                        Nama
                                    </label>
                                </td>
                                <td>
                                    <input id="nama" name="nama" type="text" placeholder="Masukkan Nama Ruangan" value="<?= $dataRuangan->nama ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="jenis">
                                        Jenis
                                    </label>
                                </td>
                                <td>
                                    <input id="jenis" name="jenis" type="text" placeholder="Masukkan Jenis Ruangan" value="<?= $dataRuangan->jenis ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="kapasitas">
                                        Kapasitas
                                    </label>
                                </td>
                                <td>
                                    <input id="kapasitas" name="kapasitas" type="text" placeholder="Masukkan Kapasitas Ruangan" value="<?= $dataRuangan->kapasitas ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="lantai">
                                        Lantai
                                    </label>
                                </td>
                                <td>
                                    <input id="lantai" name="lantai" type="number" placeholder="Masukkan Lantai Ruangan" value="<?= $dataRuangan->lantai ?>" required>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="block text-pink-700 text-sm font-bold mb-2" for="notes">
                                        <b>Notes</b>: <span style="font-style: italic; color: green">Untuk melihat kordinat lokasi, silahkan buka <a href="https://maps.google.com" target="_blank" class="font-bold">Google Maps</a>,
                                            dan klik kanan dibagian lokasi kemudian copy kordinat nya</span>
                                    </label>
                                    <img src="./Assets/Images/contoh-map.png" alt="cool image" width="700px" height="300px">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="latitude">
                                        Latitude
                                    </label>
                                </td>
                                <td>
                                    <input id="latitude" name="latitude" type="text" placeholder="Masukkan Latitude" value="<?= $dataRuangan->latitude ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="longitude">
                                        Longitude
                                    </label>
                                </td>
                                <td>
                                    <input id="longitude" name="longitude" type="text" placeholder="Masukkan Longitude" value="<?= $dataRuangan->longitude ?>" required>
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