<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$id = $_GET['id'];
$dataProdi = $prodiService->findById($id);
$dataDosen = $dosenService->findAll();
$dataJurusan = $jurusanService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Prodi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Edit Data Prodi</h1>
                <div>
                    <form action="ProdiProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="fakultas">
                                        Nama Prodi
                                    </label>
                                </td>
                                <td>
                                    <input id="nama" name="nama" type="text" placeholder="Masukkan Nama Mahasiswa" value="<?= $dataProdi->nama ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="kaprodi">
                                        Kaprodi
                                    </label>
                                </td>
                                <td>
                                    <select id="kaprodi" name="kaprodi" required>
                                        <?php foreach ($dataDosen as $j) : ?>
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataProdi->kaprodi->id) echo 'selected'; ?>><?= $j->namaDepan . ' ' . $j->namaBelakang; ?></option>
                                        <?php endforeach; ?>
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
                                        <option value="A" <?php if ($dataProdi->akreditasi == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if ($dataProdi->akreditasi == 'B') echo 'selected'; ?>>B</option>
                                        <option value="C" <?php if ($dataProdi->akreditasi == 'C') echo 'selected'; ?>>C</option>
                                        <option value="D" <?php if ($dataProdi->akreditasi == 'D') echo 'selected'; ?>>D</option>
                                        <option value="E" <?php if ($dataProdi->akreditasi == 'E') echo 'selected'; ?>>E</option>
                                    </select>
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
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataProdi->jurusan->id) echo 'selected'; ?>><?= $j->nama; ?></option>
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

</html>