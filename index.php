<?php 
$page = "galvena";
require "header.php";
?>

    <section id="sak" class="animate">
    <div class="welcom">
    <p>Esat sveicināti</p>
    <h1>Tūrisma aģentūrā <span>Apskati Latviju</span></h1>
    <p>Izvēlies piemērotāko ceļojumu un apskati Latviju kopā ar mums!</p>
    <a href="#piedavajumi" class="btn">Apskati ceļojumus</a>
</div>
    <div class="video">
        <video autoplay muted loop id="myVideo">
            <source src=".\images\video.MP4">
        </video>
    </div>
</section>

<section id = "parMums" class="animate">
    <h1><span>Kas mēs esam?</span></h1>
    <div class="main">
        <div class="box1">
             <h3 class="animate">Par mums</h3>
             <h2 class="animate">Apskati Latviju</h2>

             <p class="animate">
Mēs, tūrisma aģentūra "Apskati Latviju", jau vairākus gadus veidojam unikālus maršrutus un vadām aizraujošas ekskursijas pa Latviju. Ar mums jūsu ceļojums kļūs par neaizmirstamu piedzīvojumu, atklājot Latvijas kultūras un dabas skaistumu.</p>

             <div class="boxicons animate">
                <div class="iconbox">
                <i class="fas fa-medal"></i>
                <p>Darbā jau 10+ gadus</p>
                </div>
                <div class="iconbox">
                <i class="fas fa-map-marker-alt"></i>
                <p>50000+ apmeklētāju</p>
                </div>
                <div class="iconbox">
                <i class="fas fa-star"></i>
                <p>Labākas atsauksmes Latvijā</p>
                </div>
             </div>
        </div>

        <img class="animate" src="images/icon.png">

    </div>
</section>

<section id="aktualitates" class="animate">
    <h1><span>Aktualitātes</span></h1>
    <div class="box-container1">
    <div class="box-container1 animate">
    <?php
        require "assets/connect_db.php";

        
        $aktualitatesSQL = "SELECT * FROM apskati_aktualitates ORDER BY Piev_Datums DESC LIMIT 1";
        $atlasaAktualitates = mysqli_query($savienojums, $aktualitatesSQL);

        if(mysqli_num_rows($atlasaAktualitates) > 0){
            while($aktualitate = mysqli_fetch_assoc($atlasaAktualitates)){
                echo"
                <div class='box' id='pirmais'>
                <img src='{$aktualitate['Attels']}'>
                <h2>{$aktualitate['Nosaukums']}<a href='aktualitates.php'> <i class='fas fa-arrow-right'></i></a></h2>
                </div>
                ";
            }
        } else {
            echo "Nav nevienu piedāvājumu";
        }
    ?>
    </div>
    <div class="box-container2 animate">
    <?php
        
        $aktualitates1SQL = "SELECT * FROM apskati_aktualitates ORDER BY Piev_Datums DESC LIMIT 1, 4";
        $atlasaAktualitates1 = mysqli_query($savienojums, $aktualitates1SQL);

        if(mysqli_num_rows($atlasaAktualitates1) > 0){
            while($aktualitate1 = mysqli_fetch_assoc($atlasaAktualitates1)){
                echo"
                <div class='box'>
                <img src='{$aktualitate1['Attels']}'>
                <h2>{$aktualitate1['Nosaukums']}</h2>
                </div>
                ";
            }
        } else {
            echo "Nav nevienu piedāvājumu";
        }
    ?>
    </div>
    </div>
</section>

<section id="piedavajumi" class="animate">
    <h1><span>Mūsu piedāvājumi</span></h1>
     <div class="box-container2">
     <?php
        require "assets/connect_db.php";

        $piedavajumiSQL = "SELECT * FROM apskati_piedavajumi ORDER BY Piev_Datums DESC LIMIT  4";
        $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiSQL);

        if(mysqli_num_rows($atlasaPiedavajumi) > 0){
            while($piedavajums = mysqli_fetch_assoc($atlasaPiedavajumi)){
                echo"
                <div class='box'>
                <img src='{$piedavajums['Attels']}'>
                <h2>{$piedavajums['Nosaukums']}</h2>
                </div>
                ";
            }
        }else{
            echo "Nav nevienu piedāvājumu";
        }
        ?>
     </div>
     <a href="piedavajumi.php" class="btn2"><span>Lasīt vairāk</span></a>
</section>

<?php 
require "footer.php";
?>
