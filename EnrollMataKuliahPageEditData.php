<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$id = $_GET['id'];
$dataEnroll = $enrollMataKuliahService->findById($id);
$dataMahasiswa = $mahasiswaService->findAll();
$dataMataKuliah = $mataKuliahRepository->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Enroll Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Edit Data Enroll Mata Kuliah</h1>
                <div>
                    <form action="EnrollMataKuliahProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
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
                                            <option value="<?= $mahasiswa->id ?>" <?= $mahasiswa->id == $dataEnroll->idMahasiswa ? 'selected' : '' ?>><?= $mahasiswa->namaDepan . ' ' . $mahasiswa->namaBelakang ?></option>
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
                                            <option value="<?= $mataKuliah->id ?>" <?= $mataKuliah->id == $dataEnroll->idMataKuliah ? 'selected' : '' ?>><?= $mataKuliah->nama ?></option>
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
                                        <option value="1" <?= $dataEnroll->semester == 1 ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $dataEnroll->semester == 2 ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $dataEnroll->semester == 3 ? 'selected' : '' ?>>3</option>
                                        <option value="4" <?= $dataEnroll->semester == 4 ? 'selected' : '' ?>>4</option>
                                        <option value="5" <?= $dataEnroll->semester == 5 ? 'selected' : '' ?>>5</option>
                                        <option value="6" <?= $dataEnroll->semester == 6 ? 'selected' : '' ?>>6</option>
                                        <option value="7" <?= $dataEnroll->semester == 7 ? 'selected' : '' ?>>7</option>
                                        <option value="8" <?= $dataEnroll->semester == 8 ? 'selected' : '' ?>>8</option>
                                        <option value="9" <?= $dataEnroll->semester == 9 ? 'selected' : '' ?>>9</option>
                                        <option value="10" <?= $dataEnroll->semester == 10 ? 'selected' : '' ?>>10</option>
                                        <option value="11" <?= $dataEnroll->semester == 11 ? 'selected' : '' ?>>11</option>
                                        <option value="12" <?= $dataEnroll->semester == 12 ? 'selected' : '' ?>>12</option>

                                    </select>

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
                                        <option value="A" <?= $dataEnroll->nilai == 'A' ? 'selected' : '' ?>>A</option>
                                        <option value="A-" <?= $dataEnroll->nilai == 'A-' ? 'selected' : '' ?>>A-</option>
                                        <option value="B+" <?= $dataEnroll->nilai == 'B+' ? 'selected' : '' ?>>B+</option>
                                        <option value="B" <?= $dataEnroll->nilai == 'B' ? 'selected' : '' ?>>B</option>
                                        <option value="B-" <?= $dataEnroll->nilai == 'B-' ? 'selected' : '' ?>>B-</option>
                                        <option value="C+" <?= $dataEnroll->nilai == 'C+' ? 'selected' : '' ?>>C+</option>
                                        <option value="C" <?= $dataEnroll->nilai == 'C' ? 'selected' : '' ?>>C</option>
                                        <option value="C-" <?= $dataEnroll->nilai == 'C-' ? 'selected' : '' ?>>C-</option>
                                        <option value="D+" <?= $dataEnroll->nilai == 'D' ? 'selected' : '' ?>>D+</option>
                                        <option value="D" <?= $dataEnroll->nilai == 'D' ? 'selected' : '' ?>>D</option>
                                        <option value="D-" <?= $dataEnroll->nilai == 'D-' ? 'selected' : '' ?>>D-</option>
                                        <option value="E" <?= $dataEnroll->nilai == 'E' ? 'selected' : '' ?>>E</option>
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