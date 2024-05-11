<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style_main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="assets/script.js" defer></script>
    <title>Apskati Latviju</title>
</head>
<body>
<header>
        <a href="#" class="logo"><img src="images/latvia.png" alt=""></a>
        <nav class="navbar">
            <a href="#parmums">Par mums</a>
            <a href="#jaunumi">Aktualitātes</a>
            <a href="#piedavajumi">Piedāvājumi</a>       
            <a href="#kontakti">Kontakti</a> 
        </nav>
    </header>

    <section id="parmums">
    <div class="welcom">
    <p>Esat sveicināti!</p>
    <h1>Tūrisma aģentūrā <span>Apskati Latviju</span></h1>
    <p>Jau vairākus gadus mūsu uzņēmums izstrādā tūrisma maršrutus Latvijā.<br>Apskatiet mūsu populārākos maršrutu piedāvājumus un izbaudiet Latviju kopā ar mums!</p>
</div>
    <div class="video">
        <video autoplay muted loop id="myVideo">
            <source src=".\images\video.MP4">
        </video>
    </div>
</section>

<section id="piedavajumi">
    <h1><span>Visi piedāvājumi</span></h1>
     <div class="box-container1">
     <?php
        require "assets/connect_db.php";

        $piedavajumiSQL = "SELECT * FROM apskati_piedavajumi";
        $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiSQL);

        if(mysqli_num_rows($atlasaPiedavajumi) > 0){
            while($piedavajums = mysqli_fetch_assoc($atlasaPiedavajumi)){
                echo"
                <div class='box'>
                <h2>{$piedavajums['Nosaukums']}</h2>
                <div class='fotos'>
                <img src='{$piedavajums['Attels']}'>
                <iframe src={$piedavajums['Karte']}></iframe>
                </div>
                <p>{$piedavajums['Apraksts']}</p>
                <p>Cena: no {$piedavajums['Cena']} eur</p>
                   <form action = 'pieteikums.php' method='post'>
                   <button type='submit' class='btn' name='pieteikties' value='{$piedavajums['Nosaukums']}'>Pieteikties</button>
                   </form>
                </div>
                ";
            }

        }else{
            echo "Nav nevienas aktuālas cpeciālitātes";
        }
        ?>
     </div>

</section>

<section id="kontakti">
    <div class="kontform">
    <h1><span>Kontakti</span></h1>
    <div class="box-container">
    <div class="icon">
       <i class="fas fa-phone"></i><br>
       <h3>Tālrunis</h3>
       <p>+371 67 777 777</p>
       <p>+371 61 111 111</p>
    </div>
    <div class="icon">
       <i class="fas fa-envelope"></i><br>
       <h3>E-pasts</h3>
       <p>apskatiLatviju@gmail.com</p>
    </div>
    <div class="icon">
       <i class="fas fa-map-marker-alt"></i><br>
       <h3>Adrese</h3>
       <p>kakaja ta iela 37 <br> Liepāja, LV-4305, Latvija</p>
    </div>
   </div>

   <div class="row">
    <form action = "" method = "post">
        <div class="box-container">
        <input type="text" name="vards" placeholder="Vārds" class="box" required>
        <input type="email" name="epasts" placeholder="E-pasts" class="box" required>
        <input type="tel" name="talrunis" placeholder="Tālrunis" class="box" required>
        </div>
        <textarea name="zinojums" placeholder="Tava ziņa" class="box" required></textarea>
        <button type="submit" class="btn" name="nosutit">Sazināties</button>
        <!-- <?php
        require 'assets/mail.php';
        ?> -->
    </form>
   </div>
    </form>
   </div>
</section>

<footer>
<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17616.429411658326!2d21.00551208438658!3d56.50128502145561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46faa6100b75a58f%3A0xb6051730e87a9a9a!2sPu%C4%B7u%20Bode!5e0!3m2!1sru!2slv!4v1715439050285!5m2!1sru!2slv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</footer>
</body>
</html>