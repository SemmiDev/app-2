<?php
require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("admin");
$dataMhs = $mahasiswaService->findAll();

$id = $_GET['id'];
$jurusanId = $_GET['jurusan_id'];
$listProdiAvailableInJurusan = $prodiService->listProdiInJurusan($jurusanId);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Mahasiswa</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">

                <?php if (count($listProdiAvailableInJurusan) == 0) : ?>
                    <h4 style="color: #CC3333">Mohon maaf, tidak ada prodi yang tersedia untuk jurusan <?= $jurusanService->findById($jurusanId)->nama ?> </h4>
                <?php else: ?>
                <h2>Pilih Prodi</h2>
                <div>
                    <form action="MahasiswaProsesData.php?act=update-prodi" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="mb-4">
                            <label  for="prodi">Prodi</label>
                            <select name="prodi" id="prodi">
                                <?php foreach ($listProdiAvailableInJurusan as $prodi) : ?>
                                    <option value="<?= $prodi['id_prodi'] ?>"><?= $prodi['nama_prodi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <button type="submit" style="margin-top: 20px;"> Simpan </button>
                        </div>
                    </form>
                </div>
                <?php endif ?>
            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>
    <?php include('./Layouts/Footer.php') ?>
    </body>
    </html>