<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("mahasiswa");

$email = $sessionService->current()->email;    
$mhs = $mahasiswaRepository->findByEmail($email);

$dataMahasiswa = $mahasiswaService->findAll();
$dataMataKuliah = $mataKuliahRepository->findAllByJurusanId($mhs->idJurusan);

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
                    <form action="EnrollMataKuliahProsesData.php?act=create2" method="POST">
                        <input type="hidden" name="id_mahasiswa" value="<?= $mhs->id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="mataKuliah">
                                        Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <select id="mataKuliah" name="id_mata_kuliah" required>
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