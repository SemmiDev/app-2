<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$id = $_GET['id'];
$dataMengajar = $mengajarService->findById($id);
$dataDosen = $dosenService->findAll();
$dataMataKuliah = $mataKuliahService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Mengajar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Edit Data Mengajar</h1>
                <div>
                    <form action="MengajarProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="idDosen">
                                        Dosen
                                    </label>
                                </td>
                                <td>
                                    <select id="idDosen" name="idDosen">
                                        <?php foreach ($dataDosen as $dosen) : ?>
                                            <option value="<?= $dosen->id; ?>" <?= $dosen->id == $dataMengajar->idDosen ? 'selected' : ''; ?>>
                                                <?= $dosen->namaDepan . ' ' . $dosen->namaBelakang; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="idMataKuliah">
                                        Mata Kuliah
                                    </label>
                                </td>
                                <td>
                                    <select id="idMataKuliah" name="idMataKuliah">
                                        <?php foreach ($dataMataKuliah as $mataKuliah) : ?>
                                            <option value="<?= $mataKuliah->id; ?>" <?= $mataKuliah->id == $dataMengajar->idMataKuliah ? 'selected' : ''; ?>>
                                                <?= $mataKuliah->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="hari">
                                        Hari
                                    </label>
                                </td>
                                <td>
                                    <select id="hari" name="hari">
                                        <option value="Senin" <?= $dataMengajar->hari == 'Senin' ? 'selected' : ''; ?>>Senin</option>
                                        <option value="Selasa" <?= $dataMengajar->hari == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                                        <option value="Rabu" <?= $dataMengajar->hari == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                                        <option value="Kamis" <?= $dataMengajar->hari == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                                        <option value="Jumat" <?= $dataMengajar->hari == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
                                    </select>
                                </td>
                            </tr>         
                            
                            <tr>
                                <td>
                                    <label for="jamMulai">
                                        Jam Mulai
                                    </label>
                                </td>
                                <td>
                                    <input id="jamMulai" name="jamMulai" type="time" placeholder="Masukkan Jam Mulai" value="<?= $dataMengajar->jamMulai ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="jamSelesai">
                                        Jam Selesai
                                    </label>
                                </td>
                                <td>
                                    <input id="jamSelesai" name="jamSelesai" type="time" placeholder="Masukkan Jam selesai" value="<?= $dataMengajar->jamSelesai ?>">
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