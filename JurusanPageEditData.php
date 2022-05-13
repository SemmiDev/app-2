<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$id = $_GET['id'];
$dataJurusan = $jurusanService->findById($id);
$dataFakultas = $fakultasService->findAll();
$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Jurusan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Edit Data Jurusan</h1>
                <div>
                    <form action="JurusanProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama">
                                        Nama Jurusan
                                    </label>
                                </td>
                                <td>
                                    <input id="nama" name="nama" type="text" placeholder="Masukkan nama jurusan" value="<?= $dataJurusan->nama ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="kajur">
                                        Kajur
                                    </label>
                                </td>
                                <td>
                                    <select id="kajur" name="kajur" required>
                                        <?php foreach ($dataDosen as $dosen) : ?>
                                            <option value="<?= $dosen->id ?>" <?= $dosen->id == $dataJurusan->idKajur ? 'selected' : '' ?>><?= $dosen->namaDepan . ' ' . $dosen->namaBelakang ?></option>
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
                                        <option value="A" <?php if ($dataJurusan->akreditasi == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if ($dataJurusan->akreditasi == 'B') echo 'selected'; ?>>B</option>
                                        <option value="C" <?php if ($dataJurusan->akreditasi == 'C') echo 'selected'; ?>>C</option>
                                        <option value="D" <?php if ($dataJurusan->akreditasi == 'D') echo 'selected'; ?>>D</option>
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
                                    <label for="fakultas">
                                        Fakultas
                                    </label>
                                </td>
                                <td>
                                    <select id="fakultas" name="idFakultas">
                                        <?php foreach ($dataFakultas as $fakultas) : ?>
                                            <option value="<?= $fakultas->id; ?>" <?php if ($dataJurusan->fakultas->id == $fakultas->id) echo 'selected'; ?>><?= $fakultas->nama; ?></option>
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