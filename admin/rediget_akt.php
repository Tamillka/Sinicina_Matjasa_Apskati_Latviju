<?php 
require "header.php";
$page = "aktualitates";
?>

<section class="tabulas">
<div class="nosaukums"><span>Rediģēt aktuālitātes:</span></div>
           
            <table class="adminTable">
                <form action="" method="POST">
                <tr>  
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        
                        <td class="tableValue">
                            <input type="text" name="nosaukums" placeholder="Ievadi aktuālitātes nosaukumu*" required>
                        </td>
                    </tr>
                    <tr>
                      
                        <td class="tableValue apraksts">
                            <textarea name="apraksts" placeholder="Ievadi aktuālitātes aprakstu*" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue">
                            <input type="text" name="attels" placeholder="Ievadi attēla URL*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn piev" type="submit" name="rediget">Rediģēt</button>
                        </td>
                    </tr>
                </form>
            </table>

          

</section>
<?php 
require "footer.php";
?>