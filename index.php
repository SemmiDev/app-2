<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">

                <?php 
                    require_once './App.php';
                    $admin = mustSectionAuthorizedInRoles('admin');    
                    $mahasiswa = mustSectionAuthorizedInRoles('mahasiswa');    
                    $dosen = mustSectionAuthorizedInRoles('dosen');
                    $email = $sessionService->current()->email;    
                    $email = substr($email, 0, strpos($email, '@'));
               ?>

                <?php if ($admin or $mahasiswa or $dosen) { ?>
                    <p>Selamat Datang  <b> <?= $email ?></b> </p>
                <?php } ?>

            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>
    <?php include('./Layouts/Footer.php') ?>
</body>

</html>