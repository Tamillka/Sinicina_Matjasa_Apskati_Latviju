<?php 
require "header.php";
$page = "aktualitates";
?>

<section class="tabulas">
<div class="nosaukums"><span>Rediģēt aktuālitātes:</span></div>

<?php 
             if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['redigetAkt'])){
                    $aktID = $_POST['redigetAkt'];
                    $atlasit_akt_SQL = "SELECT * FROM apskati_aktualitates WHERE Aktualitates_ID = $aktID";
                    $atlasa_akt = mysqli_query($savienojums, $atlasit_akt_SQL);

                    if(!$atlasa_akt){
                        echo "Kļūda ".mysqli_error($savienojums);
                    } else {
                        $akt = mysqli_fetch_array($atlasa_akt);
                        if($akt){
                       
            ?>
           
            <table class="adminTable">
                
                <form action="" method="POST">
                <input type="hidden" name="Aktualitate_ID" value="<?php echo $akt['Aktualitates_ID']; ?>">
                <tr>  
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        
                        <td class="tableValue">
                            <input type="text" name="nosaukums" value="<?php echo $akt['Nosaukums']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                      
                        <td class="tableValue apraksts">
                            <textarea name="apraksts" required><?php echo $akt['Apraksts']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="attels" value="<?php echo $akt['Attels']; ?>" required>
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
                    $akt_ID = $_POST['Aktualitate_ID'];
                    $nosaukums_ievade = mysqli_real_escape_string($savienojums, $_POST['nosaukums']);
                    $apraksts_ievade = mysqli_real_escape_string($savienojums, $_POST['apraksts']);
                    $attels_ievade = mysqli_real_escape_string($savienojums, $_POST['attels']);

                    $rediget_SQL = "UPDATE apskati_aktualitates SET Nosaukums = '$nosaukums_ievade', Apraksts = '$apraksts_ievade', Attels = '$attels_ievade' WHERE Aktualitates_ID = $akt_ID";
                    if(mysqli_query($savienojums, $rediget_SQL)){
                        echo "<div class='notif green'>Aktualitāte ir vieksmīgi rediģēta!</div>";
                        echo "<script>setTimeout(function(){ window.location.href = './aktualitates.php'; }, 2000);</script>";
                    } else {
                        echo "<div class='notif red'>Kļūda sistēmā!</div>";
                        echo "<script>setTimeout(function(){ window.location.href = './aktualitates.php'; }, 2000);</script>";
                    }
                }
            }
            ?>
          

</section>
<?php 
require "footer.php";
?>