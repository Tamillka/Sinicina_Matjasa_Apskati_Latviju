<?php 
require "header.php";
$page = "administratori";
?>

<section class="tabulas">
<div class="nosaukums"><span>Rediģēt administratorus:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
            <tr>  
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td class="tableValue" >
                            <input type="text" name="vards" placeholder="Ievadi vārdu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue" >
                            <input type="text" name="uzvards" placeholder="Ievadi uzvārdu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue" >
                            <input type="text" name="lietotajvards" placeholder="Ievadi lietotājvārdu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue" >
                            <input type="password" name="parole" placeholder="Ievadi paroli*" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue" >
                            <input type="email" name="epasts" placeholder="Ievadi e-pastu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableValue" >
                            <input type="text" name="talrunis" placeholder="Ievadi tālruni*" required>
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