<?php 
require "header.php";
$page = "moderatori";
?>

<section class="tabulas">
<div class="nosaukums"><span>Pievienot moderatorus:</span></div>
           
            <table class="adminTable">
            <form action="" method="POST">
            <tr>
                        <th></th>
                        <th>* - obligāts lauks</th>
                    </tr>
                    <tr>
                        <td>Vārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="vards" placeholder="Ievadi vārdu*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Uzvārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="uzvards" placeholder="Ievadi uzvārdu*" required>
                        </td>
                    </tr>
                    <tr>
                    <td>lietotājvārds:</td>
                        <td class="tableValue" >
                            <input type="text" name="lietotajvards" placeholder="Ievadi lietotājvārdu*" required>
                        </td>
                    </tr>
                    <tr>
                    <td>Parole:</td>
                        <td class="tableValue" >
                            <input type="password" name="parole" placeholder="Ievadi paroli*" required>
                        </td>
                    </tr>
                    <tr>
                    <td>Epasts:</td>
                        <td class="tableValue" >
                            <input type="email" name="epasts" placeholder="Ievadi e-pastu*" required>
                        </td>
                    </tr>
                    <tr>
                    <td>Tālrunis:</td>
                        <td class="tableValue" >
                            <input type="text" name="talrunis" placeholder="Ievadi tālruni*" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <button class="btn piev" type="submit" name="pievienot">Pievienot</button>
                        </td>
                    </tr>
                </form>
            </table>

          

</section>

<?php 
require "footer.php";
?>