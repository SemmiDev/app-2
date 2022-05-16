<?php require_once './App.php' ?>

<?php if (mustSectionAuthorizedInRoles("admin")) { ?>
        <div class="leftcolumn">
                <div class="card">
                        <ul>
                                <li style="list-style: none; padding: 2px;">
                                        <a href="home" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Home</a>
                                </li>
                                <li style="list-style: none; padding: 2px;"><a href="Fakultas.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Fakultas</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="Jurusan.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Jurusan</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="Prodi.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Prodi</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="Dosen.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Dosen</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="Mahasiswa.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Mahasiswa</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="Ruangan.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Ruangan</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="MataKuliah.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Mata Kuliah</a></li>
                                <li style="list-style: none; padding: 2px;"><a href="Mengajar.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Mengajar</a></li>
                                <li style="list-style: none;  padding: 2px;"><a href="EnrollMataKuliah.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Enrol Matkul</a></li>
                        </ul>
                </div>

                <div class="card_exit">
                        <p style="font-weight: bold;text-align: center;">
                                <a href="../AuthProses.php?act=logout" style="text-decoration: none; color: #CC3333;">Keluar</a>
                        </p>
                </div>
        </div>

<?php } else if (mustSectionAuthorizedInRoles("mahasiswa")) { ?>


        <div class="leftcolumn">
                <div class="card">
                        <ul>
                                <li style="list-style: none; padding: 2px;">
                                        <a href="M_AccountDetails.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Account</a>
                                </li>
                                <li style="list-style: none; padding: 2px;"><a href="M_MahasiswaDetails.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Biodata</a></li>
                        </ul>
                </div>

                <div class="card_exit">
                        <p style="font-weight: bold;text-align: center;">
                                <a href="../AuthProses.php?act=logout" style="text-decoration: none; color: #CC3333;">Keluar</a>
                        </p>
                </div>
        </div>

<?php } else if (mustSectionAuthorizedInRoles("dosen")) { ?>

        <div class="leftcolumn">
                <div class="card">
                        <ul>
                                <li style="list-style: none; padding: 2px;">
                                        <a href="D_AccountDetails.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Account</a>
                                </li>
                                <li style="list-style: none; padding: 2px;"><a href="D_DosenDetails.php" style="text-decoration: none; color: darkslateblue; font-weight: bold;">
                                                Biodata</a></li>
                        </ul>
                </div>

                <div class="card_exit">
                        <p style="font-weight: bold;text-align: center;">
                                <a href="../AuthProses.php?act=logout" style="text-decoration: none; color: #CC3333;">Keluar</a>
                        </p>
                </div>
        </div>

<?php } ?>