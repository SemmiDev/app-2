<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMhs = $mahasiswaService->findAll();

$dataProdi =    $prodiService->findAll();
$dataJurusan = $jurusanService->findAll();
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
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Tambah Data Mahasiswa</h1>
                <div>
                    <form action="MahasiswaProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="nim">
                                        NIM
                                    </label>
                                </td>
                                <td>
                                    <input id="nim" name="nim" type="text" placeholder="automatically generated" required disabled>
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
                                <td></td>
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
                                    <label for="email">
                                        Email
                                    </label>
                                </td>
                                <td>
                                    <input id="email" name="email" type="email" placeholder="automatically generated" disabled>
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
                                    <label for="agama">
                                        Agama
                                    </label>
                                </td>
                                <td>
                                    <select id="agama" name="agama" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
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
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label for="tanggalLahir">
                                        Tanggal Lahir
                                    </label>
                                </td>
                                <td>
                                    <input type="date" id="tanggalLahir" name="tanggalLahir" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="noHp">
                                        No HP
                                    </label>
                                </td>
                                <td>
                                    <input id="noHp" name="noHp" type="text" placeholder="Masukkan No HP" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="alamat">
                                        Alamat
                                    </label>
                                </td>
                                <td>
                                    <textarea id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" required></textarea>
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
                                        <option value="Aktif">Aktif</option>
                                        <option value="Cuti Akademik">Cuti Akademik</option>
                                        <option value="Skorsing">Skorsing</option>
                                        <option value="Drop Out">Drop Out</option>
                                        <option value="Passing Out">Passing Out</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="angkatan">
                                        Angkatan
                                    </label>
                                </td>
                                <td>
                                    <input id="angkatan" name="angkatan" type="number" placeholder="Angkatan" value="<?= date('Y') ?>" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="jalur_masuk">
                                        Jalur Masuk
                                    </label>
                                </td>
                                <td>
                                    <select id="jalur_masuk" name="jalur_masuk" required>
                                        <option value="SBMPTN">SBMPTN</option>
                                        <option value="SNMPTN">SNMPTN</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="PBUD">PBUD</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="totalSks">
                                        Total SKS
                                    </label>
                                </td>
                                <td>
                                    <input id="totalSks" name="totalSks" type="number" placeholder="Masukkan Total SKS" value="0" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="semester">
                                        Semester
                                    </label>
                                </td>
                                <td>
                                    <input id="semester" name="semester" type="number" placeholder="Masukkan Semester" value="1" required>
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
                                        <?php foreach ($dataJurusan as $j) : ?>
                                            <option value="<?= $j->id; ?>"><?= $j->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="dosen">
                                        Dosen PA
                                    </label>
                                </td>
                                <td>

                                    <select id="dosen" name="dosen" required>
                                        <option value="">Pilih Dosen PA</option>
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