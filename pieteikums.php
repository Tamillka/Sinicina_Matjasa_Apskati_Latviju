<?php 
$page = "piedavajumi";
require "header.php";
?>

<section id="pieteikums">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['iesniegt'])){
        require ("assets/connect_db.php");

        $vards_ievade = mysqli_real_escape_string($savienojums, $_POST['vards']);
        $uzvards_ievade = mysqli_real_escape_string($savienojums, $_POST['uzvards']);
        $talrunis_ievade = mysqli_real_escape_string($savienojums, $_POST['talrunis']);
        $epasts_ievade = mysqli_real_escape_string($savienojums, $_POST['epasts']);
        $izveletais_ievade = mysqli_real_escape_string($savienojums, $_POST['izveletais']);
        $pilseta_ievade = mysqli_real_escape_string($savienojums, $_POST['pilseta']);
        $datums_ievade = mysqli_real_escape_string($savienojums, $_POST['datums']);
        $komentars_ievade = mysqli_real_escape_string($savienojums, $_POST['komentars']);

        // Pārbauda, vai visi lauki ir aizpildīti
        if($vards_ievade == "" || $uzvards_ievade == "" ||  $talrunis_ievade == "" || $epasts_ievade == "" || $izveletais_ievade == "" || $pilseta_ievade == "" || $datums_ievade == "") { 
            echo "<div class='notif red'>Nav aizpildīti visi obligātie lauki!</div>";
            header("Refresh: 2; url=./");
        } else {
            $pieteikums_SQL = "INSERT INTO apskati_klienti (Vards, Uzvards, Talrunis, Epasts, Izv_Marsruts, Pilseta, Cel_datums, Komentars) VALUES ('$vards_ievade', '$uzvards_ievade', '$talrunis_ievade', '$epasts_ievade', '$izveletais_ievade', '$pilseta_ievade', '$datums_ievade', '$komentars_ievade')";
            
            if(mysqli_query($savienojums, $pieteikums_SQL)){
                echo "<div class='notif green'>Pieteikums pieņemts. Sazināsimies ar Jums vēlāk!</div>";
                header("Refresh: 1; url=./");
            } else {
                echo "<div class='notif red'>Neizdevās pieteikties! Mēģiniet vēlreiz!</div>";
                header("Refresh: 1; url=./");
            }
        }
    } else {
        require ("assets/connect_db.php");
        $pieteiktais_marsruts = mysqli_real_escape_string($savienojums, $_POST['pieteikties']);
        
        $pilsetas_SQL = "
            SELECT pm.Pilseta 
            FROM apskati_pilsetas_marsruti pm
            JOIN apskati_piedavajumi p ON pm.id_marsruts = p.PiedavajumsID
            WHERE p.Nosaukums = '$pieteiktais_marsruts'
        ";
        
        $pilsetas_rezultats = mysqli_query($savienojums, $pilsetas_SQL);
        ?>

        <h1><span>Pieteicies ceļojumam</span></h1>

        <form method="POST">
            <h2>Tu izvēlējies maršrutu <span><?php echo $pieteiktais_marsruts;?></span></h2>
            <div class="inputs">
                <input type="text" name="vards" class="box" placeholder="Vārds" required>  
                <input type="text" name="uzvards" class="box" placeholder="Uzvārds" required>
                <input type="tel" name="talrunis" class="box" placeholder="Tālrunis" required>
                <input type="email" name="epasts" class="box" placeholder="E-pasts" required> 
                <input type="hidden" name="izveletais" class="box" value="<?php echo $pieteiktais_marsruts;?>" required>
                <select name="pilseta" class="box" required>
                    <option value="">Izbraukšanas pilsēta</option>
                    <?php
                    while($pilseta = mysqli_fetch_assoc($pilsetas_rezultats)){
                        echo "<option value=\"{$pilseta['Pilseta']}\">{$pilseta['Pilseta']}</option>";
                    }
                    ?>
                </select>
                <label>Ceļojuma datums</label>
                 <input type="date" id="datums" name="datums" required>
                <input type="text" name="komentars" placeholder="Komentārs" class="box">
            </div>
            <button type="submit" class="btn" name="iesniegt">Pieteikties</button>
        </form>

<?php
    }
} else {
    echo "<div class='notif red'>Kaut kas nogāja greizi! Aqtgriezies sākumlapā, mēģini vēlreiz!</div>";
    header("Refresh: 1; url=./");
}
?>
</section>
<?php 
require "footer.php";
?>