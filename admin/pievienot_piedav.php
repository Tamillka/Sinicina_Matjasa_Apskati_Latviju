<?php 
require "header.php";
$page = "piedavajumi";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot piedāvājumus:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
                    <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Piedāvājums:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="nosaukums" placeholder="Ievadi piedāvājuma nosaukumu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Apraksts:</td>
                        <td class="tableValue apraksts" id="plats">
                            <textarea name="apraksts" placeholder="Ievadi piedāvājuma aprakstu*" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Attēls:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="attels" placeholder="Ievadi attēla URL*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Karte:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="karte" placeholder="Ievadi kartes kodu(saturs iekavās, bez tagiem)*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Cena:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="cena" placeholder="Ievadi maršruta cenu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Galapunkta tālrunis:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="talrunis" placeholder="Ievadi tālruni*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Galapunkta e-pasts:</td>
                        <td class="tableValue" id="plats">
                            <input type="text" name="epasts" placeholder="Ievadi e-pastu*" required>
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