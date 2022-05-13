<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMhs = $mahasiswaService->findAll();

$id = $_GET['id'];
$dataMahasiswa = $mahasiswaService->findById($id);
$dataJurusan = $jurusanService->findAll();
$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Tambah Data Mahasiswa</h1>
                <div>
                    <form action="MahasiswaProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="nim">
                                        NIM
                                    </label>
                                </td>
                                <td>
                                    <input id="nim" name="nim" type="text" placeholder="automatically generated" value="<?= $dataMahasiswa->nim ?>" required disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="namaDepan">
                                        Nama Depan
                                    </label>
                                </td>
                                <td>
                                    <input id="namaDepan" name="namaDepan" type="text" placeholder="Masukkan Nama Depan" value="<?= $dataMahasiswa->namaDepan ?>" required>
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
                                    <input id="namaBelakang" name="namaBelakang" type="text" placeholder="Masukkan Nama Belakang" value="<?= $dataMahasiswa->namaBelakang ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email">
                                        Email
                                    </label>
                                </td>
                                <td>
                                    <input id="email" name="email" type="email" placeholder="automatically generated" value="<?= $dataMahasiswa->email ?>" disabled>
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
                                        <option value="Pria" <?php if ($dataMahasiswa->jenisKelamin == 'Pria') echo 'selected'; ?>>Pria</option>
                                        <option value="Wanita" <?php if ($dataMahasiswa->jenisKelamin == 'Wanita') echo 'selected'; ?>>Wanita</option>
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
                                        <option value="Islam" <?php if ($dataMahasiswa->agama == 'Islam') echo 'selected'; ?>>Islam</option>
                                        <option value="Kristen" <?php if ($dataMahasiswa->agama == 'Kristen') echo 'selected'; ?>>Kristen</option>
                                        <option value="Katolik" <?php if ($dataMahasiswa->agama == 'Katolik') echo 'selected'; ?>>Katolik</option>
                                        <option value="Hindu" <?php if ($dataMahasiswa->agama == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                        <option value="Budha" <?php if ($dataMahasiswa->agama == 'Budha') echo 'selected'; ?>>Budha</option>
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
                                        <option value="S1" <?php if ($dataMahasiswa->jenjang == 'S1') echo 'selected'; ?>>S1</option>
                                        <option value="S2" <?php if ($dataMahasiswa->jenjang == 'S2') echo 'selected'; ?>>S2</option>
                                        <option value="S3" <?php if ($dataMahasiswa->jenjang == 'S3') echo 'selected'; ?>>S3</option>
                                        <option value="D2" <?php if ($dataMahasiswa->jenjang == 'D2') echo 'selected'; ?>>D2</option>
                                        <option value="D3" <?php if ($dataMahasiswa->jenjang == 'D3') echo 'selected'; ?>>D3</option>
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
                                    <input type="date" id="tanggalLahir" name="tanggalLahir" value="<?= $dataMahasiswa->tanggalLahir ?>" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="noHp">
                                        No HP
                                    </label>
                                </td>
                                <td>
                                    <input id="noHp" name="noHp" type="text" placeholder="Masukkan No HP" value="<?= $dataMahasiswa->noHP ?>" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="alamat">
                                        Alamat
                                    </label>
                                </td>
                                <td>
                                    <textarea id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" required>
                    <?= trim($dataMahasiswa->alamat) ?>
                    </textarea>
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
                                        <option value="Aktif" <?php if ($dataMahasiswa->status == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?php if ($dataMahasiswa->status == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
                                        <option value="Cuti Akademik" <?php if ($dataMahasiswa->status == 'Cuti Akademik') echo 'selected'; ?>>Cuti Akademik</option>
                                        <option value="Skorsing" <?php if ($dataMahasiswa->status == 'Skorsing') echo 'selected'; ?>>Skorsing</option>
                                        <option value="Drop Out" <?php if ($dataMahasiswa->status == 'Drop Out') echo 'selected'; ?>>Drop Out</option>
                                        <option value="Passing Out" <?php if ($dataMahasiswa->status == 'Passing Out') echo 'selected'; ?>>Passing Out</option>
                                        <option value="Non Aktif" <?php if ($dataMahasiswa->status == 'Non Aktif') echo 'selected'; ?>>Non Aktif</option>
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
                                    <input id="angkatan" name="angkatan" type="number" placeholder="Angkatan" value="<?= $dataMahasiswa->angkatan ?>" required>
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
                                        <option value="<?= $dataMahasiswa->jalurMasuk ?>"><?= $dataMahasiswa->jalurMasuk ?></option>
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
                                    <input id="totalSks" name="totalSks" type="number" placeholder="Masukkan Total SKS" value="<?= $dataMahasiswa->totalSKS ?>" required>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <label for="semester">
                                        Semester
                                    </label>
                                </td>
                                <td>
                                    <input id="semester" name="semester" type="number" placeholder="Masukkan Semester" value="<?= $dataMahasiswa->semester ?>" required>
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
                                        <?php foreach ($dataJurusan as $j) : ?>
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataMahasiswa->jurusan->id) echo 'selected'; ?>><?= $j->nama; ?></option>
                                        <?php endforeach; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="dosen">
                                        Dosen PA
                                    </label>
                                </td>
                                <td>
                                    <select id="dosen" name="dosen">
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id ?>" <?php if ($d->id == $dataMahasiswa->dosen->id) echo 'selected'; ?>><?= $d->namaDepan . ' ' . $d->namaBelakang ?></option>
                                        <?php endforeach; ?>

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