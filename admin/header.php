<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="../assets/script_admin.js" defer></script>
    <title>Apskati Latviju</title>
</head>
<body>

        <div class="aside">
        <h1>Administrēšana</h1>
        <aside>
        
        <nav class="navbar">
        <div class="user">
            <i class="fas fa-user"></i>
        <p class="logout">lietotājvards<a href="../login.php">
            <?php echo $_SESSION['lietotajvardsTAM']." "; ?>
                 <i class = "fas fa-power-off"></i></a></p>
                </div>
            <a href="./" class="<?php echo ($page == 'sakums' ? 'current' : ''); ?>">Sākumlapa</a>
            <a href="pieteikumi.php" class="<?php echo ($page == 'pieteikumi' ? 'current' : ''); ?>">Pieteikumi</a>
            <a href="aktualitates.php" class="<?php echo ($page == 'aktualitates' ? 'current' : ''); ?>">Aktualitātes</a>
            <a href="piedavajumi.php" class="<?php echo ($page == 'piedavajumi' ? 'current' : ''); ?>">Piedāvājumi</a>
            <a href="administratori.php" class="<?php echo ($page == 'administratori' ? 'current' : ''); ?>">Administratori</a>
            <a href="moderatori.php" class="<?php echo ($page == 'moderatori' ? 'current' : ''); ?>">Moderatori</a>      
            <a href="../index.php" class="btn log"><i class="fas fa-sign-out-alt"></i> Uz galveno lapu</a> 
        </nav>
        
        
</aside>
</div>
<div id="menu-btn" class="fas fa-bars"></div>