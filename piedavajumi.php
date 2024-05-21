<?php 
$page = "piedavajumi";
require "header.php";
?>

<section id="VisiPiedavajumi">
    <h1><span>Mūsu piedāvājumi</span></h1>
     <div class="box-container1">
     <?php
        require "assets/connect_db.php";

        $piedavajumiSQL = "SELECT * FROM apskati_piedavajumi ORDER BY Piev_Datums DESC ";
        $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiSQL);

        if(mysqli_num_rows($atlasaPiedavajumi) > 0){
            while($piedavajums = mysqli_fetch_assoc($atlasaPiedavajumi)){
                $nosaukumsId = htmlspecialchars($piedavajums['Nosaukums'], ENT_QUOTES);
                echo"
                <div class='box'>
                <h2>{$piedavajums['Nosaukums']}</h2>
                <div class='fotos'>
                <img src='{$piedavajums['Attels']}'>
                <iframe src={$piedavajums['Karte']}></iframe>
                </div>
                <p>{$piedavajums['Apraksts']}</p>
                <p>Cena: no {$piedavajums['Cena']} eur</p>
                <button type='button' class='btn2' onclick='toggleInfo(\"info-{$nosaukumsId}\")'>Skatīt vairāk</button>
                <div id='info-{$nosaukumsId}' style='display: none;'>
                    <p>Galapunkta tālrunis: <b>{$piedavajums['Talrunis']}</b></p>
                    <p>Galapunkta e-pasts: <b>{$piedavajums['Epasts']}</b></p>
                </div>
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
</section>


<?php 
require "footer.php";
?>

