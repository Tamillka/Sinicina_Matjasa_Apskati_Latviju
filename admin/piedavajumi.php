<?php 
require "header.php";
$page = "piedavajumi";
?>

<div class="tabulas">
<div class="nosaukums"><span>Piedāvājumi:</span></div>
<table class="adminTable">
<tr>
                    <th>ID</th>
                    <th>Galapunkts</th>
                    <th>Cena</th>
                    <th>Apraksts</th>
                    <th>Attēls</th>
                    <th>Tālrunis</th>
                    <th>E-pasts</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td><a href="rediget_piedav.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td><a href="rediget_piedav.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr><tr>
                    <td>4</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td><a href="rediget_piedav.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
            </table>
            <a href="pievienot_piedav.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>

            </div>
            </div>
<?php 
require "footer.php";
?>