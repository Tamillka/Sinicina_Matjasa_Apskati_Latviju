<?php 
$page = "piedavajumi";
require "header.php";
?>

<section id="pieteikums">
    <h1><span>Pieteicies ceļojumam</span></h1>

    <form method="POST">
        <h2>Tu izvēlējies maršrutu <span><?php echo $_POST['pieteikties'];?></span></h2>
        <div class="inputs">
            <input type="text" name="vards" class="box" placeholder = "Vārds" required>  
            <input type="text" name="uzvards" class="box" placeholder = "Uzvārds" required>
            <input type="tel" name="talrunis" class="box" placeholder = "Tālrunis" required>
            <input type="email" name="epasts" class="box" placeholder = "E-pasts"required> 
            <input type="text" name="izveletais" class="box" value="<?php echo $_POST['pieteikties'];?>" readonly required >
            <select name="pilseta" class="box" required>
                <option value="">Izbraukšanas pilsēta</option>
                <option value="">Liepāja</option>
                <option value="">Rīga</option>
            </select>
            <input type="text" name="komentars" placeholder = "Komentārs" class="box">
        </div>
        <button type="submit" class="btn" name="iesniegt">Pieteikties</button>
    </form>
</section>
<?php 
require "footer.php";
?>