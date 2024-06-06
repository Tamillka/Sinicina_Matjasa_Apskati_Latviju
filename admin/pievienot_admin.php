<?php 
require "header.php";
$page = "administratori";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot administratorus:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
            <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Vārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="vards" placeholder="Ievadi vārdu*" required>
                        </td>
                    </tr>
                    <tr>
                    <td>lietotājvārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="lietotajvards" placeholder="Ievadi lietotājvārdu*" required>
                        </td>
                    </tr>
                    <tr>
                    <td>Parole:</td>
                        <td class="tableValue" >
                            <input type="password" name="parole" placeholder="Ievadi paroli*" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <button class="btn piev" type="submit" name="pievienot">Pievienot</button>
                        </td>
                    </tr>
                </form>
            </table>

            <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['pievienot'])){
                    require ("../assets/connect_db.php");

                    $vards_ievade = mysqli_real_escape_string($savienojums, $_POST['vards']);
                    $lietotajv_ievade = mysqli_real_escape_string($savienojums, $_POST['lietotajvards']);
                    $parole_ievade = mysqli_real_escape_string($savienojums, $_POST['parole']);
                    $hashedPassword = password_hash($parole_ievade, PASSWORD_DEFAULT);
    
                    $pievienot_SQL = "INSERT INTO apskati_lietotaji (Vards, Lietotajvards, Parole, Liet_Stat) VALUES ('$vards_ievade', '$lietotajv_ievade', '$hashedPassword', 0)";
                    if(mysqli_query($savienojums, $pievienot_SQL)){

                    echo "<div class='notif green'>Administrators pievienots</div>";
                    header("Refresh: 2, url=./administratori.php");
                }else{
                    echo "<div class='notif red'>Kļūda sistēmā!</div>";
                    header("Refresh: 2, url=./administratori.php");
                }
            }       
        }
            ?>

</section>

<?php 
require "footer.php";
?>