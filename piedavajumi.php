<?php 
$page = "piedavajumi";
require "header.php";
require "assets/connect_db.php"; // Pārvietots augstāk, lai būtu pieejams gan filtrēšanai, gan piedāvājumu atlasei
?>

<section id="VisiPiedavajumi" class="animate">
<div class="filter-container">
        <i class="fas fa-filter filter-icon"></i>
        <div class="filtri">
            <form method="get" action="" id="filter-form">
                <div class="multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>None selected</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <?php
                        require "assets/connect_db.php"; // Ensure this path is correct for your setup
                        $pilsetas_SQL = "SELECT DISTINCT Pilseta FROM apskati_pilsetas_marsruti ORDER BY Pilseta";
                        $pilsetas_rezultats = mysqli_query($savienojums, $pilsetas_SQL);
                        while($pilseta = mysqli_fetch_assoc($pilsetas_rezultats)){
                            $checked = '';
                            if (isset($_GET['pilseta']) && in_array($pilseta['Pilseta'], $_GET['pilseta'])) {
                                $checked = 'checked';
                            }
                            echo "<label><input type='checkbox' name='pilseta[]' value=\"{$pilseta['Pilseta']}\" $checked />{$pilseta['Pilseta']}</label>";
                        }
                        ?>
                    </div>
                </div>
                <select name="cena" id="cena">
                    <option value="">Visas cenas</option>
                    <option value="2" <?php if (isset($_GET['cena']) && $_GET['cena'] == '2') echo 'selected'; ?>>Līdz 2 eur</option>
                    <option value="5" <?php if (isset($_GET['cena']) && $_GET['cena'] == '5') echo 'selected'; ?>>Līdz 5 eur</option>
                    <option value="10" <?php if (isset($_GET['cena']) && $_GET['cena'] == '10') echo 'selected'; ?>>Līdz 10 eur</option>
                </select>
                <button type="submit" class="btn">Filtrēt</button>
            </form>
        </div>
    </div>

    <h1><span>Mūsu piedāvājumi</span></h1>
    <div class="box-container1">
        <?php
        $piedavajumiSQL = "SELECT p.* FROM apskati_piedavajumi p JOIN apskati_pilsetas_marsruti m ON m.id_marsruts = p.PiedavajumsID";
        $whereClauses = array();

        if (isset($_GET['pilseta']) && !empty($_GET['pilseta'])) {
            $selectedPilsetas = array_map(function($pilseta) use ($savienojums) {
                return mysqli_real_escape_string($savienojums, $pilseta);
            }, $_GET['pilseta']);
            $pilsetaList = "'" . implode("','", $selectedPilsetas) . "'";
            $whereClauses[] = "m.Pilseta IN ($pilsetaList)";
        }

        if (isset($_GET['cena']) && $_GET['cena'] != '') {
            $selectedCena = mysqli_real_escape_string($savienojums, $_GET['cena']);
            $whereClauses[] = "Cena <= '$selectedCena'";
        }

        if (!empty($whereClauses)) {
            $piedavajumiSQL .= " WHERE " . implode(' AND ', $whereClauses);
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
                    <button type='button' class='btn2' onclick='toggleInfo(\"info-{$nosaukumsId}\")'><span>Lasīt vairāk</span></button>
                    <div id='info-{$nosaukumsId}' style='display: none;'>
                        <p>Adrese: <b>{$piedavajums['Adrese']}</b></p>
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