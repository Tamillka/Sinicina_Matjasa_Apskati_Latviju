<?php 
require "header.php";
$page = "piedavajumi";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot piedāvājumus:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
                    <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Piedāvājums:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="nosaukums" placeholder="Ievadi piedāvājuma nosaukumu*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Apraksts:</td>
                        <td class="tableValue apraksts" id="plats">
                            <textarea name="apraksts" placeholder="Ievadi piedāvājuma aprakstu*" autocomplete="off" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Attēls:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="attels" placeholder="Ievadi attēla URL*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Karte:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="karte" placeholder="Ievadi kartes kodu(saturs iekavās, bez tagiem)*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Cena:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="cena" placeholder="Ievadi maršruta cenu*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Galapunkta tālrunis:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="talrunis" placeholder="Ievadi tālruni" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>Galapunkta e-pasts:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="epasts" placeholder="Ievadi e-pastu" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn piev" type="submit" name="pievienot">Pievienot</button>
                        </td>
                    </tr>
                </form>
            </table>

            <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['pievienot'])){
                    require ("../assets/connect_db.php");

                    $nosaukums_ievade = mysqli_real_escape_string($savienojums, $_POST['nosaukums']);
                    $apraksts_ievade = mysqli_real_escape_string($savienojums, $_POST['apraksts']);
                    $attels_ievade = mysqli_real_escape_string($savienojums, $_POST['attels']);
                    $karte_ievade = mysqli_real_escape_string($savienojums, $_POST['karte']);
                    $cena_ievade = mysqli_real_escape_string($savienojums, $_POST['cena']);
                    $talrunis_ievade = mysqli_real_escape_string($savienojums, $_POST['talrunis']);
                    $epasts_ievade = mysqli_real_escape_string($savienojums, $_POST['epasts']);

                    $pievienot_SQL = "INSERT INTO apskati_piedavajumi (Nosaukums, Apraksts, Attels, Karte, Cena, Talrunis, Epasts) VALUES ('$nosaukums_ievade', '$apraksts_ievade', '$attels_ievade', '$karte_ievade', '$cena_ievade', '$talrunis_ievade', '$epasts_ievade')";
                    if(mysqli_query($savienojums, $pievienot_SQL)){
                    echo "<div class='notif green'>Piedāvājums tiek veiksmīgi pievienots!</div>";
                    header("Refresh: 2, url=./piedavajumi.php");
                    
                }else{
                    echo "<div class='notif red'>Kļūda sistēmā!</div>";
                    header("Refresh: 2, url=./piedavajumi.php");
                }
            }       
        }
        ?>

</section>

<?php 
require "footer.php";
?>