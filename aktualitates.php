<?php 
$page = "aktualitates";
require "header.php";
?>
<section id="VisasAktualitates" class="animate">
    <h1><span>Apskati jaunumus</span></h1>
    <div class="box-container">
        <?php
            require "assets/connect_db.php";

            $aktualitatesSQL = "SELECT * FROM apskati_aktualitates ORDER BY Piev_Datums desc";
            $atlasaAktualitates = mysqli_query($savienojums, $aktualitatesSQL);

            if(mysqli_num_rows($atlasaAktualitates) > 0){
                while($aktualitate = mysqli_fetch_assoc($atlasaAktualitates)){
                    echo"
                    <div class='box'>
                    <div class='boxim'>
                    <img src='{$aktualitate['Attels']}'>
                    
                    <div class='content'>
                    <p>{$aktualitate['Apraksts']}</p>
                    </div>
                    </div>
                    <h2>{$aktualitate['Nosaukums']}</h2>
                    <div class='apr'>
                    <p>".date("d/m/Y H:i", strtotime($aktualitate['Piev_Datums']))."</p>
                    <i class='fas fa-plus'></i>
                    </div>
                    </div>
                    ";
                }
            } else {
                echo "Nav nevienu piedāvājumu";
            }
        ?>
    </div>
</section>
<?php 
require "footer.php";
?>