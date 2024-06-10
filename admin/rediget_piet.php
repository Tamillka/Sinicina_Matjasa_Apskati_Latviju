<?php 
require "header.php";
$page = "pieteikumi";
?>

<section class="tabulas">
<div class="nosaukums"><span>Rediģēt pieteikumi:</span></div>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['mainitStatusu'])){
        // statusa izmainas 
        $atlasitais_statuss = $_POST['Statuss'];
        $atjaunot_statusu_SQL = "UPDATE apskati_klienti SET Statuss = '$atlasitais_statuss' WHERE Klienta_ID = ".$_POST['mainitStatusu'];

        if(mysqli_query($savienojums, $atjaunot_statusu_SQL)){
            echo "<div class='notif green'>Pieteikuma statuss veiksmīgi nomainīts!</div>";
            header("Refresh: 3; url=./pieteikumi.php");
        }else{
            echo "<div class='notif red'>Kļūda sistēmā!!</div>";
            header("Refresh: 3; url=./pieteikumi.php");
        }
    }else{             
        $piet_ID = $_POST['apskatit'];
        $atlasit_piet_SQL = "SELECT * FROM apskati_klienti k JOIN apskati_statuss s ON k.Statuss = s.Statuss_id WHERE Klienta_ID = $piet_ID";
        $atlasa_pieteikumi = mysqli_query($savienojums, $atlasit_piet_SQL);

        $statusi_SQL = "SELECT * FROM apskati_statuss";
        $atlasa_statusus = mysqli_query($savienojums,  $statusi_SQL);
        $statusi = "";

        while($statuss = mysqli_fetch_array($atlasa_statusus)){
            $statusi = $statusi."<option value='{$statuss['Statuss_id']}'>{$statuss['Stat_nosaukums']}</option>";
        }
        $pieteikums = mysqli_fetch_array($atlasa_pieteikumi);           
?>

<table class="adminTable">
    <tr>            
        <td class="tableValue"><?php echo '<p><b>Vārds:</b> ' .$pieteikums['Vards']. '</p>'?></td>
    </tr>
    <tr>
        <td class="tableValue"><?php echo '<p><b>Uzvārds:</b> ' .$pieteikums['Uzvards']. '</p>'?></td>
    </tr>
    <tr>
        <td class="tableValue"><?php echo '<p><b>Tālrunis:</b> ' .$pieteikums['Talrunis']. '</p>'?></td>
    </tr>
    <tr>
        <td class="tableValue"><?php echo '<p><b>E-pasts:</b> ' .$pieteikums['Epasts']. '</p>'?></td>
    </tr>
    <tr>
        <td class="tableValue"><?php echo '<p><b>Izvēlētais maršruts:</b> ' .$pieteikums['Izv_Marsruts']. '</p>'?></td>
    </tr>
    <tr>
        <td class="tableValue"><?php echo '<p><b>Ceļojuma izvēlētais datums:</b> ' .$pieteikums['Cel_datums']. '</p>'?></td>
    </tr>
    <tr>
        <td class="tableValue"><?php echo '<p><b>Pieteikšanās datums:</b> ' . $pieteikums['Piet_Datums'] . '</p>'; ?></td>
    </tr>
    <tr>
        <td>
        <form method="POST">
            <select name="Statuss">
                <option value="<?php echo $pieteikums['Statuss'];?>" selected hidden><?php echo $pieteikums['Stat_nosaukums'];?></option>
                <?php echo  $statusi; ?>
            </select>
            <button class="btn piev" type="submit" name="mainitStatusu" value="<?php echo $piet_ID;?>">Saglabāt</button>
        </form>
        </td>
    </tr>
</table>
<?php
    }
} else {
    header("Refresh: 0; url=./pieteikumi.php");
}
?>
</section>
<?php 
require "footer.php";
?>