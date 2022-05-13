<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMhs = $mahasiswaService->findAll();

$id = $_GET['id'];
$dataFakultas = $fakultasService->findById($id);
$dataDosen = $dosenService->findAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Fakultas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <h1>Edit Data Fakultas</h1>
                <div>
                    <form action="FakultasProsesData.php?act=update" method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="fakultas">
                                        Nama Fakultas
                                    </label>
                                </td>
                                <td>
                                    <input id="fakultas" name="fakultas" type="text" placeholder="Masukkan nama fakultas" value="<?= $dataFakultas->nama ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="dekan">
                                        Dekan
                                    </label>
                                </td>
                                <td>
                                    <select id="dekan" name="dekan" required>
                                        <?php foreach ($dataDosen as $j) : ?>
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataFakultas->idDekan) echo 'selected'; ?>><?= $j->namaDepan . ' ' . $j->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="wakil_dekan_1">
                                        Walik Dekan 1
                                    </label>
                                </td>
                                <td>
                                    <select id="wakil_dekan_1" name="wakil_dekan_1" required>
                                        <?php foreach ($dataDosen as $j) : ?>
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataFakultas->idWakilDekan1) echo 'selected'; ?>><?= $j->namaDepan . ' ' . $j->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="wakil_dekan_2">
                                        Walik Dekan 2
                                    </label>
                                </td>
                                <td>
                                    <select id="wakil_dekan_2" name="wakil_dekan_2" required>
                                        <?php foreach ($dataDosen as $j) : ?>
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataFakultas->idWakilDekan2) echo 'selected'; ?>><?= $j->namaDepan . ' ' . $j->namaBelakang; ?></option>
                                        <?php endforeach; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="wakil_dekan_3">
                                        Walik Dekan 4
                                    </label>
                                </td>
                                <td>
                                    <select id="wakil_dekan_3" name="wakil_dekan_3" required>
                                        <?php foreach ($dataDosen as $j) : ?>
                                            <option value="<?= $j->id; ?>" <?php if ($j->id == $dataFakultas->idWakilDekan3) echo 'selected'; ?>><?= $j->namaDepan . ' ' . $j->namaBelakang; ?></option>
                                        <?php endforeach; ?>
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