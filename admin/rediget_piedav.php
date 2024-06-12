<?php
require "header.php";
$page = "piedavajumi";
?>

<section class="tabulas">
<div class="nosaukums"><span>Rediģēt piedāvājumus:</span></div>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['redigetPiedav'])) {
        $piedID = $_POST['redigetPiedav'];
        $atlasit_pied_SQL = "SELECT * FROM apskati_piedavajumi WHERE PiedavajumsID = $piedID";
        $atlasa_pied = mysqli_query($savienojums, $atlasit_pied_SQL);

        if (!$atlasa_pied) {
            echo "Kļūda " . mysqli_error($savienojums);
        } else {
            $pied = mysqli_fetch_array($atlasa_pied);
            if ($pied) {
?>
            <table class="adminTable">
                <form action="" method="POST">
                    <input type="hidden" name="PiedavajumsID" value="<?php echo $pied['PiedavajumsID']; ?>">
                    <tr>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="attels" value="<?php echo $pied['Attels']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="nosaukums" value="<?php echo $pied['Nosaukums']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="cena" value="<?php echo $pied['Cena']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue apraksts">
                            <textarea name="apraksts"><?php echo $pied['Apraksts']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <textarea name="karte"><?php echo $pied['Karte']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="talrunis" value="<?php echo $pied['Talrunis']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="epasts" value="<?php echo $pied['Epasts']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn piev" type="submit" name="rediget">Rediģēt</button>
                        </td>
                    </tr>
                </form>
            </table>
<?php
            }
        }
    } elseif (isset($_POST['rediget'])) {
        $pied_ID = $_POST['PiedavajumsID'];
        $attels_ievade = mysqli_real_escape_string($savienojums, $_POST['attels']);
        $nosaukums_ievade = mysqli_real_escape_string($savienojums, $_POST['nosaukums']);
        $cena_ievade = mysqli_real_escape_string($savienojums, $_POST['cena']);
        $apraksts_ievade = mysqli_real_escape_string($savienojums, $_POST['apraksts']);
        $karte_ievade = mysqli_real_escape_string($savienojums, $_POST['karte']);
        $talrunis_ievade = mysqli_real_escape_string($savienojums, $_POST['talrunis']);
        $epasts_ievade = mysqli_real_escape_string($savienojums, $_POST['epasts']);

        $rediget_SQL = "UPDATE apskati_piedavajumi SET Attels = '$attels_ievade', Nosaukums = '$nosaukums_ievade', Cena = '$cena_ievade', Apraksts = '$apraksts_ievade', Karte = '$karte_ievade', Talrunis = '$talrunis_ievade', Epasts = '$epasts_ievade' WHERE PiedavajumsID = $pied_ID";
        if (mysqli_query($savienojums, $rediget_SQL)) {
            echo "<div class='notif green'>Piedāvājums ir vieksmīgi rediģēts!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './piedavajumi.php'; }, 2000);</script>";
        } else {
            echo "<div class='notif red'>Kļūda sistēmā!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './piedavajumi.php'; }, 2000);</script>";
        }
    } elseif (isset($_POST['pievienot'])) {
        $pied_ID = $_POST['PiedavajumsID'];
        $izbPil_ievade = mysqli_real_escape_string($savienojums, $_POST['izbrPils']);

        $pievienot_SQL = "INSERT INTO apskati_pilsetas_marsruti (Pilseta, id_marsruts) VALUES ('$izbPil_ievade', $pied_ID)";
        if (mysqli_query($savienojums, $pievienot_SQL)) {
            echo "<div class='notif green'>Pilsēta tiek veiksmīgi pievienota!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './piedavajumi.php'; }, 1000);</script>";
        } else {
            echo "<div class='notif red'>Kļūda sistēmā!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './piedavajumi.php'; }, 1000);</script>";
        }
    }
}
?>

<form method="POST" id="pilsetaa">
    <label>Pievienot izbraukšanas pilsētu</label><br>
    <input type="text" id="pilseta" name="izbrPils" placeholder="Ievadi pilsētas nosaukumu" required>
    <input type="hidden" name="PiedavajumsID" value="<?php echo $pied['PiedavajumsID']; ?>">
    <button type="submit" class="btn piev" name="pievienot">Pievienot</button>
</form>
</section>


<?php 
require "footer.php";
?>