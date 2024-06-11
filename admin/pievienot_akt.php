<?php 
require "header.php";
$page = "aktualitates";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot aktualitātes:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
                <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Aktuālitāte:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="nosaukums" placeholder="Ievadi aktuālitātes nosaukumu*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Apraksts:</td>
                        <td class="tableValue apraksts" id="plats">
                            <textarea name="apraksts" placeholder="Ievadi aktuālitātes aprakstu*" autocomplete="off" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Attēls:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="attels" placeholder="Ievadi attēla URL*" autocomplete="off" required>
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

                    $pievienot_SQL = "INSERT INTO apskati_aktualitates (Nosaukums, Apraksts, Attels) VALUES ('$nosaukums_ievade', '$apraksts_ievade', '$attels_ievade')";
                    if(mysqli_query($savienojums, $pievienot_SQL)){
                    echo "<div class='notif green'>Pievienots</div>";
                    header("Refresh: 2, url=./aktualitates.php");
                }else{
                    echo "<div class='notif red'>Kļūda sistēmā!</div>";
                    header("Refresh: 2, url=./aktualitates.php");
                }
            }       
        }
            ?>

          

</section>

<?php 
require "footer.php";
?>