<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Ruangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 id="home">Tambah Data Ruangan</h1>
                <div>
                    <form action="RuanganProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama">
                                        Nama Ruangan
                                    </label>
                                </td>
                                <td>
                                    <input id="nama" name="nama" type="text" placeholder="Masukkan Nama Ruangan" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="jenis">
                                        Jenis
                                    </label>
                                </td>
                                <td>
                                    <input id="jenis" name="jenis" type="text" placeholder="Masukkan Jenis Ruangan" required>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="kapasitas">
                                        Kapasitas
                                    </label>
                                </td>
                                <td>
                                    <input id="kapasitas" name="kapasitas" type="number" placeholder="Masukkan Kapasitas Ruangan" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="lantai">
                                        Lantai
                                    </label>
                                </td>
                                <td>
                                    <input id="lantai" name="lantai" type="number" placeholder="Masukkan Lantai Ruangan" required>
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
                                    <input id="latitude" name="latitude" type="text" placeholder="0.47533691506084985" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="longitude">
                                        Longitude
                                    </label>
                                </td>
                                <td>
                                    <input id="longitude" name="longitude" type="text" placeholder="101.38078243328162" required>
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