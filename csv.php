<!DOCTYPE html>
<html>

<head>
    <title>Import CSV</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('./Layouts/Header.php') ?>
    <div class="row">
        <div class="rightcolumn">
            <div class="card">
                <form action="MahasiswaProsesData.php?act=csv" method="post" enctype='multipart/form-data'>
                    <input type="file" name="datamahasiswacsv" accept=".csv">
                    <button type="submit" name="submit">Proses</button>
                </form>
            </div>
        </div>
        <?php include('./Layouts/Sidebar.php') ?>
    </div>
    <?php include('./Layouts/Footer.php') ?>
</body>

</html>