<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");

$dataFakultas = $fakultasService->findAll();
$dataDosen = $dosenService->findAll();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Jurusan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1 class="text-3xl md:text-5xl mb-4 font-extrabold" id="home">Tambah Data Jurusan</h1>
                <div>
                    <form action="JurusanProsesData.php?act=create" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="nama">
                                        Nama jurusan
                                    </label>
                                </td>
                                <td>
                                    <input id="nama" name="nama" type="text" placeholder="Masukkan Nama Jurusan" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="kajur">
                                        Kepala Jurusan
                                    </label>
                                </td>
                                <td>
                                    <select id="kajur" name="id_kajur" required>
                                        <option value="">Pilih Kajur</option>
                                        <?php foreach ($dataDosen as $d) : ?>
                                            <option value="<?= $d->id; ?>"><?= $d->namaDepan . ' ' . $d->namaBelakang; ?></option>
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
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
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
                                        <option value="D4">D4</option>
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
                                    <select id="fakultas" name="idFakultas" required>
                                        <?php foreach ($dataFakultas as $fakultas) : ?>
                                            <option value="<?= $fakultas->id ?>"><?= $fakultas->nama ?></option>
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