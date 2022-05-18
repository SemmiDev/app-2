<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataMahasiswa = $mahasiswaService->findAll();
$dataMataKuliah = $mataKuliahRepository->findAll();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Enroll Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 id="home">Tambah Data Enroll Mata Kuliah</h1>
                <div>
                    <form action="EnrollMataKuliahProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="mahasiswa">
                                        Mahasiswa
                                    </label>
                                </td>
                                <td>
                                    <select id="mahasiswa" name="id_mahasiswa" required>
                                        <option value="">Pilih Mahasiswa</option>
                                        <?php foreach ($dataMahasiswa as $mahasiswa) : ?>
                                            <option value="<?= $mahasiswa->id ?>"><?= $mahasiswa->nim . ' = ' . $mahasiswa->namaDepan . ' ' . $mahasiswa->namaBelakang ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="mataKuliah">
                                        Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <select id="mataKuliah" name="id_mata_kuliah" required>
                                        <option value="">Pilih Mata Kuliah</option>
                                        <?php foreach ($dataMataKuliah as $mataKuliah) : ?>
                                            <option value="<?= $mataKuliah->id ?>"><?= $mataKuliah->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
                                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="tahun_ajaran">
                                        Tahun Ajaran
                                    </label>
                                </td>
                                <td>
                                    <input type="text" id="tahun_ajaran" name="tahun_ajaran" placeholder="2022/2023" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="nilai">
                                        Nilai
                                    </label>
                                </td>
                                <td>
                                    <select id="nilai" name="nilai">
                                        <option value="">Pilih Nilai</option>
                                        <option value="E">E</option>
                                        <option value="E-">E-</option>
                                        <option value="E+">E+</option>
                                        <option value="D">D</option>
                                        <option value="D-">D-</option>
                                        <option value="D+">D+</option>
                                        <option value="C">C</option>
                                        <option value="C-">C-</option>
                                        <option value="C+">C+</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="A">A</option>
                                        <option value="A-">A-</option>
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