<?php 
require "header.php";
$page = "aktualitates";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot aktualitātes:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
                <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Aktuālitāte:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="nosaukums" placeholder="Ievadi aktuālitātes nosaukumu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Apraksts:</td>
                        <td class="tableValue apraksts" id="plats">
                            <textarea name="apraksts" placeholder="Ievadi aktuālitātes aprakstu*" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Attēls:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="attels" placeholder="Ievadi attēla URL*" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn piev" type="submit" name="pievienot">Pievienot</button>
                        </td>
                    </tr>
                </form>
            </table>

          

</section>

<?php 
require "footer.php";
?>