<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="assets/script.js" defer></script>
    <title>Apskati Latviju</title>
</head>
<body>
    <!-- <header>

    
    </header> -->

        <!-- <a href="./"  class="logo"><img src="../images/latvia.png" alt=""></a> -->
        <div class="aside">
        <h1>Administrēšana</h1>
        <aside>
        <div class="user">
            <i class="fas fa-user"></i>
        <p class="logout">lietotājvards<a href="../login.php">
            <?php echo $_SESSION['lietotajvardsTAM']." "; ?>
                 <i class = "fas fa-power-off"></i></a></p>
                </div>
        <nav class="navbar">
            <a href="./">Sākumlapa</a>
            <a href="pieteikumi.php">Pieteikumi</a>
            <a href="aktualitates.php">Aktualitātes</a>
            <a href="piedavajumi.php">Piedāvājumi</a>
            <a href="administratori.php">Administratori</a>
            <a href="moderatori.php">Moderatori</a>      
            <a href="../index.php" class="btn log"><i class="fas fa-sign-out-alt"></i> Uz galveno lapu</a> 
        </nav>
       
        
</aside>
</div>
    