<?php

require_once './App.php';
mustLogin();
mustFullAuthorizedInRoles("mahasiswa");
$current = $sessionService->current();
$dataMahasiswa = $mahasiswaRepository->findByEmail($current->email);
?>

<!DOCTYPE html>
<html>

<head>
      <title> <?= $dataMahasiswa->namaDepan ?></title>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
      <?php include('./Layouts/Header.php') ?>
      <div class="row">
            <div class="rightcolumn">
                  <div class="card">
                        <table class="my-table" border="1">
                              <tr>
                                    <td>Nama</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->namaDepan . " " . $dataMahasiswa->namaBelakang; ?></td>
                              </tr>
                              <tr>
                                    <td>NIM</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->nim; ?></td>
                              </tr>
                              <tr>
                                    <td>Email</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->email; ?></td>
                              </tr>
                              <tr>
                                    <td>Jenis Kelamin</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->jenisKelamin; ?></td>
                              </tr>
                              <tr>
                                    <td>Agama</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->agama; ?></td>
                              </tr>
                              <tr>
                                    <td>Jenjang</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->jenjang; ?></td>
                              </tr>
                              <tr>
                                    <td>Tanggal Lahir</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->tanggalLahir; ?></td>
                              </tr>
                              <tr>
                                    <td>No HP</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->noHP; ?></td>
                              </tr>
                              <tr>
                                    <td>Alamat</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->alamat; ?></td>
                              </tr>
                              <tr>
                                    <td>Status</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->status; ?></td>
                              </tr>
                              <tr>
                                    <td>Total SKS</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->totalSKS; ?></td>
                              </tr>
                              <tr>
                                    <td>Semester</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->semester; ?></td>
                              </tr>
                              <tr>
                                    <td>Angkatan</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->angkatan; ?></td>
                              </tr>
                              <tr>
                                    <td>Jalur Masuk</td>
                                    <td style="text-align: left">: <?php echo $dataMahasiswa->jalurMasuk; ?></td>
                              </tr>
                              <tr>
                                    <td>Prodi</td>
                                    <?php if (!is_null($dataMahasiswa->idProdi)) { ?>
                                          <td style="text-align: left"><?= ': ' . $prodiService->findById($dataMahasiswa->idProdi)->nama ?></td>
                                    <?php } else { ?>
                                          <td style="text-align: left">-</td>
                                    <?php } ?>

                              </tr>
                              <tr>
                                    <td>Jurusan</td>
                                    <?php if (!is_null($dataMahasiswa->idJurusan)) { ?>
                                          <td style="text-align: left"><?= ':' . $jurusanService->findById($dataMahasiswa->idJurusan)->nama ?></td>
                                    <?php } else { ?>
                                          <td style="text-align: left">-</td>
                                    <?php } ?>

                              </tr>
                              <tr>
                                    <td>Dosen PA</td>
                                    <?php if (!is_null($dataMahasiswa->idDosenPA)) { ?>
                                          <?php $dosenPA = $dosenService->findById($dataMahasiswa->idDosenPA) ?>
                                          <td style="text-align: left"> <?= ':' . $dosenPA->namaDepan . ' ' . $dosenPA->namaBelakang ?></td>
                                    <?php } else { ?>
                                          <td style="text-align: left">-</td>
                                    <?php } ?>
                              </tr>
                        </table>
                  </div>
            </div>
            <?php include('./Layouts/Sidebar.php') ?>
      </div>
      <?php include('./Layouts/Footer.php') ?>
</body>

</html>