<?php 
require "header.php";
require "../assets/connect_db.php"; // Ensure the database connection is included
$page = "administratori";
?>

<div class="tabulas">
<div class="nosaukums"><span>Administratori:</span></div>
<table class="adminTable">
    <tr>
        <th class="id">ID</th>
        <th>Vārds</th>
        <th>Lietotajvārds</th>
        <th class="sauraSuna"></th>
    </tr>
    <?php
    $adm_SQL = "SELECT * FROM apskati_lietotaji WHERE Liet_Stat = 0 ORDER BY LietotajsID";
    $atlasa_adm_SQL = mysqli_query($savienojums, $adm_SQL);
    while($admin = mysqli_fetch_array($atlasa_adm_SQL)){
        echo "
            <tr>
                <td>{$admin['LietotajsID']}</td>
                <td>{$admin['Vards']}</td>
                <td>{$admin['Lietotajvards']}</td>
                <td>
                <form class='del' method='post' action='' onsubmit=\"return confirm('Vai tiešām vēlāties izdzēst?');\">
                    <button type='submit' name='deleteAdm' value='{$admin['LietotajsID']}'><i class='fas fa-trash'></i></button>
                </form>
            </td>
            </tr>
            ";
    }
    ?>
</table>
<a href="pievienot_admin.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>
<?php
    if(isset($_POST["deleteAdm"])){
        $id = $_POST["deleteAdm"];
        $sql = "DELETE FROM apskati_lietotaji WHERE LietotajsID='$id'";
        if(mysqli_query($savienojums, $sql)){
            echo "<div class='notif green'>Moderators tiek veiksmīgi izdzēsts!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './administratori.php'; }, 2000);</script>";
        } else {
            echo "<div class='notif red'>Kļūda dzēšot administratoru!</div>";
        }
    }
    ?>

<div class="nosaukums"><span>Moderatori:</span></div>
<table class="adminTable">
    <tr>
        <th class="id">ID</th>
        <th>Vārds</th>
        <th>Lietotajvārds</th>
        <th class="sauraSuna"></th>
    </tr>
    <?php
    $mod_SQL = "SELECT * FROM apskati_lietotaji WHERE Liet_Stat = 1 ORDER BY LietotajsID";
    $atlasa_mod_SQL = mysqli_query($savienojums, $mod_SQL);
    while($moder = mysqli_fetch_array($atlasa_mod_SQL)){
        echo "
            <tr>
                <td>{$moder['LietotajsID']}</td>
                <td>{$moder['Vards']}</td>
                <td>{$moder['Lietotajvards']}</td>
                <td>
                <form class='del' method='post' action='' onsubmit=\"return confirm('Vai tiešām vēlāties izdzēst?');\">
                    <button type='submit' name='deleteModer' value='{$moder['LietotajsID']}'><i class='fas fa-trash'></i></button>
                </form>
            </td>
            </tr>
            ";
    }
    ?>
</table>
<a href="pievienot_moder.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>

<?php
    if(isset($_POST["deleteModer"])){
        $id = $_POST["deleteModer"];
        $sql = "DELETE FROM apskati_lietotaji WHERE LietotajsID='$id'";
        if(mysqli_query($savienojums, $sql)){
            echo "<div class='notif green'>Moderators tiek veiksmīgi izdzēsts!</div>";
            echo "<script>setTimeout(function(){ window.location.href = './administratori.php'; }, 2000);</script>";
        } else {
            echo "<div class='notif red'>Kļūda dzēšot moderatoru!</div>";
        }
    }
    ?>
</div>

<?php 
require "footer.php";
?>