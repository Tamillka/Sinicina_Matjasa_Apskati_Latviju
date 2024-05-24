<?php 
require "header.php";
?>

<div class="tabulas">
<div class="nosaukums"><span>Moderatori:</span></div>
<table class="adminTable">
                <tr>
                    <th class="id">ID</th>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>Lietotajvārds</th>
                    <th>Parole</th>
                    <th class="epasts">E-pasts</th>
                    <th>Tālrunis</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tamila</td>
                    <td>Matjaša</td>
                    <td>matjasa</td>
                    <td>tamilka</td>
                    <td>tamila@inbox.lv</td>
                    <td>20394857</td>    
                    <td><a href="rediget_moder.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tamila</td>
                    <td>Matjaša</td>
                    <td>matjasa</td>
                    <td>tamilka</td>
                    <td>tamila@inbox.lv</td>
                    <td>20394857</td>
                    <td><a href="rediget_moder.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr><tr>
                    <td>1</td>
                    <td>Tamila</td>
                    <td>Matjaša</td>
                    <td>matjasa</td>
                    <td>tamilka</td>
                    <td>tamila@inbox.lv</td>
                    <td>20394857</td>
                    <td><a href="rediget_moder.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
            </table>
            <a href="pievienot_moder.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>
</div>
</div>
<?php 
require "footer.php";
?>