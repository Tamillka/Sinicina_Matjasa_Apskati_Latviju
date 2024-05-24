<?php 
require "header.php";
$page = "administratori";
?>

<div class="tabulas">
<div class="nosaukums"><span>Administratori:</span></div>
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
                    <td>Nastja</td>
                    <td>Sinicina</td>
                    <td>sinicka</td>
                    <td>sinicka2</td>
                    <td>nastja@hmail.com</td>
                    <td>23456789</td>
                    <td><a href="rediget_admin.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nastja</td>
                    <td>Sinicina</td>
                    <td>sinicka</td>
                    <td>sinicka2</td>
                    <td>nastja@hmail.com</td>
                    <td>23456789</td>
                    <td><a href="rediget_admin.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr> <tr>
                    <td>1</td>
                    <td>Nastja</td>
                    <td>Sinicina</td>
                    <td>sinicka</td>
                    <td>sinicka2</td>
                    <td>nastja@hmail.com</td>
                    <td>23456789</td>
                    <td><a href="rediget_admin.php" class="btn icon" name="edit"><i class="fas fa-edit"></i></a></td>
                    <td><button type="submit" name="delete"><i class="fas fa-trash"></i></button></td>
                </tr> 
               
            </table>
            <a href="pievienot_admin.php" class="btn icon piev" name="edit"><i class="fa fa-plus-circle"></i></a>
            </div>
</div>
<?php 
require "footer.php";
?>