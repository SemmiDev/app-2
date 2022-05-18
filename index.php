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
                    
                    $authorized = mustSectionAuthorizedInRoles('admin', 'mahasiswa', 'dosen');    
                    
                    $email = $sessionService->current()->email;         // get current user email
                    $email = substr($email, 0, strpos($email, '@'));    // get string before @
                    $email = explode('.', $email);                      // split string by .
                    $email = ucfirst($email[0]);                        // uppercase first character
               ?>

                <?php if ($authorized) { ?>
                    <p>Selamat Datang  <b> <?= $email ?></b> </p>
                <?php } ?>

            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>
    <?php include('./Layouts/Footer.php') ?>
</body>

</html>