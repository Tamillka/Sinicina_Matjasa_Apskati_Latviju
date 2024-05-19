<?php 
$page = "kontakti";
require "header.php";
?>
<section id="kontakti">
    <h1><span>Kontakti</span></h1>
    <div class="box-container">
    <div class="icon">
       <i class="fas fa-phone"></i><br>
       <h3>Tālrunis</h3>
       <p>+371 67 777 111</p>
       <p>+371 24 555 761</p>
    </div>
    <div class="icon">
       <i class="fas fa-envelope"></i><br>
       <h3>E-pasts</h3>
       <p>apskatiLatviju@gmail.com</p>
    </div>
    <div class="icon">
       <i class="fas fa-map-marker-alt"></i><br>
       <h3>Adrese</h3>
       <p>kakaja ta iela 37 <br> Liepāja, LV-4305, Latvija</p>
    </div>
   </div>

   <div class="row">
    <form action = "" method = "post">
        <div class="box-container">
        <input type="text" name="vards" placeholder="Vārds" class="box" required>
        <input type="email" name="epasts" placeholder="E-pasts" class="box" required>
        <input type="tel" name="talrunis" placeholder="Tālrunis" class="box" required>
        </div>
        <textarea name="zinojums" placeholder="Tava ziņa" class="box" required></textarea>
        <button type="submit" class="btn" name="nosutit">Sazināties</button>
    </form>
   </div>
</section>

<?php 
require "footer.php";
?>
