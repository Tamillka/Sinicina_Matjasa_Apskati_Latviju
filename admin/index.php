<?php 
require "header.php";
$page = "sakums";
require "../assets/connect_db.php";
?>

<div class="admin">
<div class="skaiti">
<?php
        require "kopsavilkums.php";
    ?>
<div class="info-box animate">
<div class="box1">
        <div class="info">
            <h2><?php echo $pieteikumi;?></h2>
            <h3>Pieteikumi kopā</h3>
        </div>
        <div class="icona">
            <i class="fas fa-user"></i>
        </div>
    </div>
    <div class="box2">
        <a href="pieteikumi.php">Skatīties vairāk  <i class="fas fa-arrow-right"></i></a>
    </div>
    
</div>
<div class="info-box animate">
<div class="box1">
        <div class="info">
            <h2><?php echo $aktualitates;?></h2>
            <h3>Aktualitātes kopā</h3>
        </div>
        <div class="icona">
            <i class="fas fa-newspaper"></i>
        </div>
    </div>
    <div class="box2">
        <a href="aktualitates.php">Skatīties vairāk  <i class="fas fa-arrow-right"></i></a>
    </div>
    
</div>
<div class="info-box animate">
<div class="box1">
        <div class="info">
            <h2><?php echo $piedavajumi;?></h2>
            <h3>Piedāvājumu kopā</h3>
        </div>
        <div class="icona">
            <i class="fas fa-map"></i>
        </div>
    </div>
    <div class="box2">
        <a href="piedavajumi.php">Skatīties vairāk  <i class="fas fa-arrow-right"></i></a>
    </div>
    
</div>
<div class="info-box animate">
<div class="box1">
        <div class="info">
            <h2><?php echo $administratori;?></h2>
            <h3>Administratori kopā</h3>
        </div>
        <div class="icona">
            <i class="fas fa-users"></i>
        </div>
    </div>
    <div class="box2">
        <a href="administratori.php">Skatīties vairāk  <i class="fas fa-arrow-right"></i></a>
    </div>
    
</div>
<div class="info-box animate">
<div class="box1">
        <div class="info">
            <h2><?php echo $moderatori;?></h2>
            <h3>Moderatori kopā</h3>
        </div>
        <div class="icona">
            <i class="fas fa-users"></i>
        </div>
    </div>
    <div class="box2">
        <a href="administratori.php">Skatīties vairāk  <i class="fas fa-arrow-right"></i></a>
    </div>
</div>
</div>

<div class="tabulas">
    <div class="nosaukums"><span>Pieteikumu skaits:</span></div>
<table class="adminTable">
                <tr>
                    <th>Maršruta galapunkts</th>
                    <th>Pieteikumi kopā</th>
                </tr>
                <?php
                    $nosSQL = "SELECT Izv_Marsruts, COUNT(Izv_Marsruts) AS NosCount FROM apskati_klienti GROUP BY Izv_Marsruts ORDER BY NosCount DESC";
                    
                    $atlasaNosSQL = mysqli_query($savienojums, $nosSQL);
                    
                    while($Nosaukums = mysqli_fetch_array($atlasaNosSQL)){
                        echo "
                            <tr>
                                <td>{$Nosaukums['Izv_Marsruts']}</td> 
                                <td>{$Nosaukums['NosCount']}</td> 
                            </tr>
                        ";
                    }
                ?>
            </table>
            <div class="nosaukums"><span>Pieteikumi no katras pilsētas:</span></div>
<table class="adminTable">
                <tr>
                    <th>Izbraukšanas pilsēta</th>
                    <th>Skaits</th>
                </tr>
                <?php
                    $pilSQL = "SELECT Pilseta, COUNT(Pilseta) AS PilCount FROM apskati_klienti GROUP BY Pilseta ORDER BY PilCount DESC";
                    $atlasaPilSQL = mysqli_query($savienojums, $pilSQL);
                    
                    while($Pilseta = mysqli_fetch_array($atlasaPilSQL)){
                        echo "
                            <tr>
                                <td>{$Pilseta['Pilseta']}</td> <!-- Display the specialty -->
                                <td>{$Pilseta['PilCount']}</td> <!-- Display the count of the specialty -->
                            </tr>
                        ";
                    }
                ?>
            </table>
<div class="nosaukums"><span>Jaunākie pietekumi pēdējo 24h laikā:</span></div>
<table class="adminTable">
<tr>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>Maršruta galapunkts</th>
                    <th>Pieteikšanas datums</th>
                </tr>
                <?php
                    $pietSQL = "SELECT * FROM apskati_klienti  WHERE Piet_Datums BETWEEN NOW() - INTERVAL 1 DAY AND NOW() ORDER BY Piet_Datums DESC LIMIT 7";
                    $atlasaPietSQL = mysqli_query($savienojums, $pietSQL);
                                while($pieteikums = mysqli_fetch_array($atlasaPietSQL)){
                                    echo "
                                        <tr>
                                            <td>{$pieteikums['Vards']}</td>
                                            <td>{$pieteikums['Uzvards']}</td>
                                            <td>{$pieteikums['Izv_Marsruts']}</td>
                                            <td>".date("d.m.Y. H:i", strtotime($pieteikums['Piet_Datums']))."</td>
                                        </tr>
                                    ";
                                }
                ?>
            </table>
            
</div>
</div>

</div>

<?php 
require "footer.php";
?>