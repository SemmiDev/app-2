<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Tambah Data Dosen</h1>
                <div>
                    <form action="DosenProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="nip">
                                        NIP
                                    </label>
                                </td>
                                <td>
                                    <input id="nip" name="nip" type="text" placeholder="Masukkan NIP" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="namaDepan">
                                        Nama Depan
                                    </label>
                                </td>
                                <td>
                                    <input id="namaDepan" name="namaDepan" type="text" placeholder="Masukkan Nama Depan" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="namaBelakang">
                                        Nama Belakang
                                    </label>
                                </td>
                                <td>
                                    <input id="namaBelakang" name="namaBelakang" type="text" placeholder="Masukkan Nama Belakang" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="golongan">
                                        Golongan
                                    </label>
                                </td>
                                <td>
                                    <select id="golongan" name="golongan" required>
                                        <option value="">Pilih Golongan</option>

                                        <option value="Golongan I A">Golongan I A</option>
                                        <option value="Golongan I B">Golongan I B</option>
                                        <option value="Golongan I C">Golongan I C</option>
                                        <option value="Golongan I D">Golongan I D</option>

                                        <option value="Golongan II A">Golongan II A</option>
                                        <option value="Golongan II B">Golongan II B</option>
                                        <option value="Golongan II C">Golongan II C</option>
                                        <option value="Golongan II D">Golongan II D</option>

                                        <option value="Golongan III A">Golongan III A</option>
                                        <option value="Golongan III B">Golongan III B</option>
                                        <option value="Golongan III C">Golongan III C</option>
                                        <option value="Golongan III D">Golongan III D</option>

                                        <option value="Golongan IV A">Golongan IV A</option>
                                        <option value="Golongan IV B">Golongan IV B</option>
                                        <option value="Golongan IV C">Golongan IV C</option>
                                        <option value="Golongan IV D">Golongan IV D</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="status">
                                        Status
                                    </label>
                                </td>
                                <td>
                                    <select id="status" name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Honorer">Honorer</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email">
                                        Email
                                    </label>
                                </td>
                                <td>
                                    <input id="email" name="email" type="text" placeholder="Masukkan Email" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="jenisKelamin">
                                        Jenis Kelamin
                                    </label>
                                </td>
                                <td>
                                    <select id="jenisKelamin" name="jenisKelamin" required>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="noTelp">
                                        No Telp
                                    </label>
                                </td>
                                <td>
                                    <input id="noTelp" name="noTelp" type="text" placeholder="Masukkan No Telp" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="noHP">
                                        No HP
                                    </label>
                                </td>
                                <td>
                                    <input id="noHP" name="noHP" type="text" placeholder="Masukkan No HP" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="alamat">
                                        Alamat
                                    </label>
                                </td>
                                <td>
                                    <input id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" required>
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