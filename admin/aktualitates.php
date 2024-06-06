<?php 
require "header.php";
require "../assets/connect_db.php"; // Ensure the database connection is included
$page = "aktualitates";
?>

<div class="tabulas">
    <div class="nosaukums"><span>Aktualitātes:</span></div>
    <table class="adminTable">
        <tr>
            <th>Attēls</th>
            <th>Nosaukums</th>
            <th>Apraksts</th>
            <th class="sauraSuna"></th>
            <th class="sauraSuna"></th>
        </tr>
        <?php 
        $akt_SQL = "SELECT * FROM apskati_aktualitates ORDER BY Nosaukums";
        $atlasa_akt_SQL = mysqli_query($savienojums, $akt_SQL);
        while($aktualitate = mysqli_fetch_array($atlasa_akt_SQL)){
            echo "
            <tr>
                <td><img src='{$aktualitate['Attels']}'></td>
                <td>{$aktualitate['Nosaukums']}</td>
                <td>{$aktualitate['Apraksts']}</td>
                <td>
                    <form method='POST' action='rediget_akt.php'>
                        <button type='submit' name='redigetAkt' value='{$aktualitate['Aktualitates_ID']}'><i class='fas fa-edit'></i></button>
                    </form>
                </td>
                <td>
                    <form class='del' method='post' action='' onsubmit=\"return confirm('Vai tiešām vēlāties izdzēst?');\">
                        <button type='submit' name='dzestAkt' value='{$aktualitate['Aktualitates_ID']}'><i class='fas fa-trash'></i></button>
                    </form>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
    <a href="pievienot_akt.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>

    <?php
    if(isset($_POST["dzestAkt"])){
        $id = $_POST["dzestAkt"];
        $sql = "DELETE FROM apskati_aktualitates WHERE Aktualitates_ID='$id'";
        if(mysqli_query($savienojums, $sql)){
            echo "<div class='notif green'>Aktualitāte dzēsta!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './aktualitates.php'; }, 2000);</script>";
        } else {
            echo "<div class='notif red'>Kļūda dzēšot aktualitāti!</div>";
        }
    }
    ?>
</div>

<?php 
require "footer.php";
?>