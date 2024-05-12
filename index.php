<?php 
require "header.php";
?>

    <section id="parmums">
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

<?php 
require "footer.php";
?>
