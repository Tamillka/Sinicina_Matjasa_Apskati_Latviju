<?php 
$page = "piedavajumi";
require "header.php";
require "assets/connect_db.php"; // Pārvietots augstāk, lai būtu pieejams gan filtrēšanai, gan piedāvājumu atlasei
?>

<section id="VisiPiedavajumi" class="animate">
<div class="filtri">
    <form method="get" action="">
        <select name="pilseta" id="pilseta">
            <option value="">Visas pilsētas</option>
            <?php
            $pilsetas_SQL = "SELECT DISTINCT Pilseta FROM apskati_pilsetas_marsruti order by Pilseta";
            $pilsetas_rezultats = mysqli_query($savienojums, $pilsetas_SQL);
            while($pilseta = mysqli_fetch_assoc($pilsetas_rezultats)){
                $selected = '';
                if (isset($_GET['pilseta']) && $_GET['pilseta'] == $pilseta['Pilseta']) {
                    $selected = 'selected';
                }
                echo "<option value=\"{$pilseta['Pilseta']}\" $selected>{$pilseta['Pilseta']}</option>";
            }
            ?>
        </select>
        <select name="cena" id="cena">
            <option value="">Visas cenas</option>
            <option value="2">Līdz 2 eur</option>
            <option value="5">Līdz 5 eur</option>
            <option value="10">Līdz 10 eur</option>
            <!-- Turpiniet pievienot citas cenu opcijas, ja nepieciešams -->
        </select>
        <button type="submit" class="btn">Filtrēt</button>
    </form>
</div>
    <h1><span>Mūsu piedāvājumi</span></h1>
    <div class="box-container1">
    <?php
       $piedavajumiSQL = "SELECT p.* FROM apskati_piedavajumi p JOIN apskati_pilsetas_marsruti m ON m.id_marsruts = p.PiedavajumsID";
if (isset($_GET['pilseta']) && $_GET['pilseta'] != '') {
    $selectedPilseta = mysqli_real_escape_string($savienojums, $_GET['pilseta']);
    $piedavajumiSQL .= " WHERE m.Pilseta = '$selectedPilseta'";
}

if (isset($_GET['cena']) && $_GET['cena'] != '') {
    $selectedCena = mysqli_real_escape_string($savienojums, $_GET['cena']);
    $piedavajumiSQL .= " AND Cena <= '$selectedCena'";
}

$piedavajumiSQL .= " GROUP BY p.PiedavajumsID ORDER BY p.Piev_Datums DESC";
        $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiSQL);

        if (mysqli_num_rows($atlasaPiedavajumi) > 0) {
            while ($piedavajums = mysqli_fetch_assoc($atlasaPiedavajumi)) {
                $nosaukumsId = htmlspecialchars($piedavajums['Nosaukums'], ENT_QUOTES);
                echo "
                <div class='box'>
                    <h2>{$piedavajums['Nosaukums']}</h2>
                    <div class='fotos'>
                        <img src='{$piedavajums['Attels']}'>
                        <iframe src={$piedavajums['Karte']}></iframe>
                    </div>
                    <p>{$piedavajums['Apraksts']}</p>
                    <p><b>Cena:</b> no {$piedavajums['Cena']} eur</p>
                    <p><b>Adrese: </b>{$piedavajums['Adrese']}</p>
                    <button type='button' class='btn2' onclick='toggleInfo(\"info-{$nosaukumsId}\")'><span>Lasīt vairāk</span></button>
                    <div id='info-{$nosaukumsId}' style='display: none;'>
                        <p>Galapunkta tālrunis: <b>{$piedavajums['Talrunis']}</b></p>
                        <p>Galapunkta e-pasts: <b>{$piedavajums['Epasts']}</b></p>
                    </div>
                    <form action='pieteikums.php' method='post'>
                        <button type='submit' class='btn' name='pieteikties' value='{$piedavajums['Nosaukums']}'>Pieteikties</button>
                    </form>
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