<?php 
require "header.php";
$page = "piedavajumi";
?>

<section class="tabulas">
<div class="nosaukums"><span>Rediģēt piedāvājumus:</span></div>
           
            <table class="adminTable">
                <form action="" method="POST">
                    <tr>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        
                        <td class="tableValue">
                            <input type="text" name="nosaukums" placeholder="Ievadi piedāvājuma nosaukumu*" required>
                        </td>
                    </tr>
                    <tr>
                       
                        <td class="tableValue apraksts">
                            <textarea name="apraksts" placeholder="Ievadi piedāvājuma aprakstu*" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        
                        <td class="tableValue">
                            <input type="text" name="attels" placeholder="Ievadi attēla URL*" required>
                        </td>
                    </tr>
                    <tr>
                        
                        <td class="tableValue">
                            <input type="text" name="karte" placeholder="Ievadi kartes kodu(saturs iekavās, bez tagiem)*" required>
                        </td>
                    </tr>
                    <tr>
                     
                        <td class="tableValue">
                            <input type="text" name="cena" placeholder="Ievadi maršruta cenu*" required>
                        </td>
                    </tr>
                    <tr>
                        
                        <td class="tableValue">
                            <input type="text" name="talrunis" placeholder="Ievadi tālruni*" required>
                        </td>
                    </tr>
                    <tr>
                        
                        <td class="tableValue" >
                            <input type="text" name="epasts" placeholder="Ievadi e-pastu*" required>
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