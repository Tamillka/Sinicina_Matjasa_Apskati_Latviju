<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style_main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="assets/script.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <title>Apskati Latviju</title>
</head>
<body>
<header>
<a href="./" class="logo"><img src="images/latvia.png" alt=""></a>
        <nav class="navbar">
            <div class="navigacija">
            <a href="index.php" class="<?php echo ($page == 'galvena' ? 'current' : ''); ?>">Sākumlapa</a>
            <a href="aktualitates.php" class="<?php echo ($page == 'aktualitates' ? 'current' : ''); ?>">Aktualitātes</a>
            <a href="piedavajumi.php" class="<?php echo ($page == 'piedavajumi' ? 'current' : ''); ?>">Piedāvājumi</a>       
            <a href="kontakti.php" class="<?php echo ($page == 'kontakti' ? 'current' : ''); ?>">Kontakti</a> 
            </div>
            <a href="login.php" class="btn log"><i class="fas fa-user"></i></a>

        </nav>
        
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
