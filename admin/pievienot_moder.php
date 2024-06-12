<?php 
require "header.php";
$page = "administratori";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot moderatoru:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
            <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Vārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="vards" placeholder="Ievadi vārdu*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                    <td>lietotājvārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="lietotajvards" placeholder="Ievadi lietotājvārdu*" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                    <td>Parole:</td>
                        <td class="tableValue" >
                            <input type="password" name="parole" placeholder="Ievadi paroli*" autocomplete="off" required>
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

                    $existingUserQuery = "SELECT * FROM apskati_lietotaji WHERE Lietotajvards = '$lietotajv_ievade'";
                    $existingUserResult = mysqli_query($savienojums, $existingUserQuery);

                    if (mysqli_num_rows($existingUserResult) == 0) {
                    $hashedPassword = password_hash($parole_ievade, PASSWORD_DEFAULT);
    
                    $pievienot_SQL = "INSERT INTO apskati_lietotaji (Vards, Lietotajvards, Parole, Liet_Stat) VALUES ('$vards_ievade', '$lietotajv_ievade', '$hashedPassword', 1)";
                    if(mysqli_query($savienojums, $pievienot_SQL)){

                    echo "<div class='notif green'>Moderators tiek veiksmīgi pievienots!</div>";
                    header("Refresh: 2, url=./administratori.php");
                }else{
                    echo "<div class='notif red'>Kļūda sistēmā!</div>";
                    header("Refresh: 2, url=./administratori.php");
                    }
                }else{
                    echo "<div class='notif red'>Lietotājvārds ir reģistrēts!</div>";
                    header("Refresh: 2, url=./administratori.php");
                }
            }       
        }
            ?>

</section>

<?php 
require "footer.php";
?>