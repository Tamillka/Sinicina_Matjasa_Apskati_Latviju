<?php 
require "header.php";
$page = "aktualitates";
?>

<div class="tabulas">
    <div class="nosaukums"><span>Aktualitātes:</span></div>
<table class="adminTable">
                <tr>
                    <th>ID</th>
                    <th>gal</th>
                    <th>Informācija</th>
                    <th>Attēls</th>
                    <th>Karte</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>4</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td><a href="rediget_akt.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td><a href="rediget_akt.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr><tr>
                    <td>4</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td><a href="rediget_akt.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
            </table>
            <a href="pievienot_akt.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>


<?php 
require "footer.php";
?>