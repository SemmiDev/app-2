<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$id = $_GET['id'];
$dataDosen = $dosenService->findById($id);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Edit Data Dosen</h1>
                <div>
                    <form action="DosenProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="nip">
                                        NIP
                                    </label>
                                </td>
                                <td>
                                    <input id="nip" name="nip" type="text" placeholder="Masukkan NIP" value="<?= $dataDosen->nip ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="namaDepan">
                                        Nama Depan
                                    </label>
                                </td>
                                <td>
                                    <input id="namaDepan" name="namaDepan" type="text" placeholder="Masukkan Nama Depan" value="<?= $dataDosen->namaDepan ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="namaBelakang">
                                        Nama Belakang
                                    </label>
                                </td>
                                <td>
                                    <input id="namaBelakang" name="namaBelakang" type="text" placeholder="Masukkan Nama Belakang" value="<?= $dataDosen->namaBelakang ?>" required>
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
                                        <option value="Golongan I A" <?= $dataDosen->golonganPNS == 'Golongan I A' ? 'selected' : '' ?>>Golongan I A</option>
                                        <option value="Golongan I B" <?= $dataDosen->golonganPNS == 'Golongan I B' ? 'selected' : '' ?>>Golongan I B</option>
                                        <option value="Golongan I C" <?= $dataDosen->golonganPNS == 'Golongan I C' ? 'selected' : '' ?>>Golongan I C</option>
                                        <option value="Golongan I D" <?= $dataDosen->golonganPNS == 'Golongan I D' ? 'selected' : '' ?>>Golongan I D</option>
                                        <option value="Golongan II A" <?= $dataDosen->golonganPNS == 'Golongan II A' ? 'selected' : '' ?>>Golongan II A</option>
                                        <option value="Golongan II B" <?= $dataDosen->golonganPNS == 'Golongan II B' ? 'selected' : '' ?>>Golongan II B</option>
                                        <option value="Golongan II C" <?= $dataDosen->golonganPNS == 'Golongan II C' ? 'selected' : '' ?>>Golongan II C</option>
                                        <option value="Golongan II D" <?= $dataDosen->golonganPNS == 'Golongan II D' ? 'selected' : '' ?>>Golongan II D</option>
                                        <option value="Golongan III A" <?= $dataDosen->golonganPNS == 'Golongan III A' ? 'selected' : '' ?>>Golongan III A</option>
                                        <option value="Golongan III B" <?= $dataDosen->golonganPNS == 'Golongan III B' ? 'selected' : '' ?>>Golongan III B</option>
                                        <option value="Golongan III C" <?= $dataDosen->golonganPNS == 'Golongan III C' ? 'selected' : '' ?>>Golongan III C</option>
                                        <option value="Golongan III D" <?= $dataDosen->golonganPNS == 'Golongan III D' ? 'selected' : '' ?>>Golongan III D</option>
                                        <option value="Golongan IV A" <?= $dataDosen->golonganPNS == 'Golongan IV A' ? 'selected' : '' ?>>Golongan IV A</option>
                                        <option value="Golongan IV B" <?= $dataDosen->golonganPNS == 'Golongan IV B' ? 'selected' : '' ?>>Golongan IV B</option>
                                        <option value="Golongan IV C" <?= $dataDosen->golonganPNS == 'Golongan IV C' ? 'selected' : '' ?>>Golongan IV C</option>
                                        <option value="Golongan IV D" <?= $dataDosen->golonganPNS == 'Golongan IV D' ? 'selected' : '' ?>>Golongan IV D</option>
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
                                        <option value="Kontrak" <?= $dataDosen->status == 'Kontrak' ? 'selected' : '' ?>>Kontrak</option>
                                        <option value="Honorer" <?= $dataDosen->status == 'Honorer' ? 'selected' : '' ?>>Honorer</option>
                                        <option value="Tetap" <?= $dataDosen->status == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
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
                                        <option value="A" <?php if ($dataJurusan->akreditasi == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if ($dataJurusan->akreditasi == 'B') echo 'selected'; ?>>B</option>
                                        <option value="C" <?php if ($dataJurusan->akreditasi == 'C') echo 'selected'; ?>>C</option>
                                        <option value="D" <?php if ($dataJurusan->akreditasi == 'D') echo 'selected'; ?>>D</option>
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
                                    <input id="email" name="email" type="text" placeholder="Masukkan Email" value="<?= $dataDosen->email ?>" required>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <label for="jenjang">
                                        Jenjang
                                    </label>
                                </td>
                                <td>
                                    <select id="jenjang" name="jenjang" required>
                                        <option value="S1" <?php if ($dataJurusan->jenjang == 'S1') echo 'selected'; ?>>S1</option>
                                        <option value="S2" <?php if ($dataJurusan->jenjang == 'S2') echo 'selected'; ?>>S2</option>
                                        <option value="S3" <?php if ($dataJurusan->jenjang == 'S3') echo 'selected'; ?>>S3</option>
                                        <option value="D2" <?php if ($dataJurusan->jenjang == 'D2') echo 'selected'; ?>>D2</option>
                                        <option value="D3" <?php if ($dataJurusan->jenjang == 'D3') echo 'selected'; ?>>D3</option>
                                        <option value="D4" <?php if ($dataJurusan->jenjang == 'D4') echo 'selected'; ?>>D4</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="jenisKelamin">
                                        Jenis Kelamin
                                    </label>
                                </td>
                                <td>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="jenisKelamin" name="jenisKelamin" required>
                                        <option value="Pria" <?= $dataDosen->jenisKelamin == 'Pria' ? 'selected' : '' ?>>Pria</option>
                                        <option value="Wanita" <?= $dataDosen->jenisKelamin == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
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
                                    <input id="noTelp" name="noTelp" type="text" placeholder="Masukkan No Telp" value="<?= $dataDosen->noTelp ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="noHP">
                                        No HP
                                    </label>
                                </td>
                                <td>
                                    <input id="noHP" name="noHP" type="text" placeholder="Masukkan No HP" value="<?= $dataDosen->noHP ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="alamat">
                                        Alamat
                                    </label>
                                </td>
                                <td>
                                    <input id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" value="<?= $dataDosen->alamat ?>" required>
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