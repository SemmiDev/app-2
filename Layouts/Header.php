<?php require_once "./App.php"; ?>

<div class="header">
  <div class="topnav">
    <a href="index.php">SIA Universitas Riau </a>    

    <?php if (mustSectionAuthorizedInRoles('admin')) { ?>
      <a href="index.php" style="float:right;"> <?=$sessionService->current()->email ?></a>
    <?php } else if (mustSectionAuthorizedInRoles('mahasiswa')) { ?>
      <a href="index.php" style="float:right;"> <?=$sessionService->current()->email ?></a>
    <?php } else if (mustSectionAuthorizedInRoles('dosen')) {?>
      <a href="index.php" style="float:right;"> <?=$sessionService->current()->email ?></a>
    <?php } ?>
    
  </div>
</div>