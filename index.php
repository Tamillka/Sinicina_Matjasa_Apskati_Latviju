<?php 
$page = "galvena";
require "header.php";
?>

    <section id="sak">
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

<section id = "parMums">
    <h1><span>Kas mēs esam?</span></h1>
    <div class="main">
        <div class="box1">
             <h3>Par mums</h3>
             <h2>Apskati Latviju</h2>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vero soluta harum maiores dolores deleniti doloribus et omnis iusto aliquam. Neque, ut dolore alias quisquam totam ipsa deserunt porro? Eaque enim cupiditate, amet maxime optio qui sit quibusdam dignissimos rem pariatur repellendus non minima ipsam quos quaerat harum veniam sunt?</p>
             <div class="boxicons">
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
        <img src="images/icon.jpg">
    </div>
</section>

<section id="aktualitates">
    <h1><span>Aktualitātes</span></h1>
    <div class="box-aktualitates">
     
     </div>
</section>

<section id="piedavajumi">
    <h1><span>Mūsu piedāvājumi</span></h1>
     <div class="box-container1">
     <?php
        require "assets/connect_db.php";

        $piedavajumiSQL = "SELECT * FROM apskati_piedavajumi ORDER BY Piev_Datums DESC LIMIT  4";
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
            echo "Nav nevienu piedāvājumu";
        }
        ?>
     </div>
     <a href="piedavajumi.php" class="btn vairak">Lasīt vairāk</a>
</section>

<?php 
require "footer.php";
?>
