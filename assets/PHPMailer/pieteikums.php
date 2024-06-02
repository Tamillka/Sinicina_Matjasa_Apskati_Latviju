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
            <div class="button"><a href="login.php" class="btn log">Ielogoties</a></div>

        </nav>
        
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>



    <footer>
<div class="blocks">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d53944.34391823554!2d24.037057074001922!3d56.949445980834454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2slv!4v1716489452963!5m2!1sru!2slv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <p><b>Mūsu e-pasts:</b><br>apskatiLatviju@gmail.com</p>
    <p><b>Mūsu tālrunis:</b><br>+371 67 777 111</p>
    <p><b>Mūsu adrese:</b><br>Rīga, Brīvības bulvāris 36, LV-3709</p>
</div>
<p>Apskati Latviju &copy; 2024</p>
</footer>
</body>
</html>