<?php 
require "header.php";
$page = "piedavajumi";
?>

<div class="tabulas">
    <div class="nosaukums liels"><span>Piedāvājumi:</span></div>
    <table class="adminTable liela">
        <tr>
            <th>Attēls</th>
            <th>Galapunkts</th>
            <th class="sauraSuna2">Cena</th>
            <th>Apraksts</th>
            <th>Karte</th>
            <th class="small">Tālrunis</th>
            <th>E-pasts</th>
            <th class="sauraSuna2"></th>
            <th class="sauraSuna2"></th>
        </tr>
        <?php 
        $pied_SQL = "SELECT * FROM apskati_piedavajumi ORDER BY Nosaukums";
        $atlasa_pied_SQL = mysqli_query($savienojums, $pied_SQL);
        while($piedavajums = mysqli_fetch_array($atlasa_pied_SQL)){
            echo "
            <tr>
                <td><img src='{$piedavajums['Attels']}'></td>
                <td>{$piedavajums['Nosaukums']}</td>
                <td>{$piedavajums['Cena']}</td>
                <td>{$piedavajums['Apraksts']}</td>
                <td><iframe src={$piedavajums['Karte']}></iframe></td>
                <td>{$piedavajums['Talrunis']}</td>
                <td class='epast'>{$piedavajums['Epasts']}</td>
                <td>
                    <form method='POST' action='rediget_piedav.php'>
                        <button type='submit' name='redigetPiedav' value='{$piedavajums['PiedavajumsID']}'><i class='fas fa-edit'></i></button>
                    </form>
                </td>
                <td>
                    <form class='del' method='post' action='' onsubmit=\"return confirm('Vai tiešām vēlāties izdzēst?');\">
                        <button type='submit' name='dzestPiedav' value='{$piedavajums['PiedavajumsID']}'><i class='fas fa-trash'></i></button>
                    </form>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
    <a href="pievienot_piedav.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>

    <?php
    if(isset($_POST["dzestPiedav"])){
        $id = $_POST["dzestPiedav"];
        $sql = "DELETE FROM apskati_piedavajumi WHERE PiedavajumsID='$id'";
        if(mysqli_query($savienojums, $sql)){
            echo "<div class='notif green'>Piedāvājums tiek veiksmīgi izdzēsts!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './aktualitates.php'; }, 2000);</script>";
        } else {
            echo "<div class='notif red'>Kļūda dzēšot piedāvājumu!</div>";
        }
    }
    ?>
</div>

<?php 
require "footer.php";
?>