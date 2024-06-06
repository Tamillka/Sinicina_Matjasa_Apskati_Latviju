<?php 
require "header.php";
$page = "pieteikumi";
?>

<div class="tabulas">
    <div class="nosaukums"><span>Pieteikumi</span></div>
    <table class="adminTable">
        <tr>
            <th>Vārds</th>
            <th>Uzvārds</th>
            <th>Tālrunis</th>
            <th class="epasts">E-pasts</th>
            <th>Maršrūta galapunkts</th>
            <th>Izbraukšanas pilsēta</th>
            <th>Ceļojuma datums</th>
            <th>Pieteikšanas datums</th>
            <th>Statuss</th>
            <th></th>
        </tr>
        <?php 
        $piet_SQL = "SELECT * FROM apskati_klienti k JOIN apskati_statuss s ON k.Statuss = s.Statuss_id ORDER BY Piet_Datums DESC";
        $atlasa_piet_SQL = mysqli_query($savienojums, $piet_SQL);
        while($pieteikums = mysqli_fetch_array($atlasa_piet_SQL)) {
            $stat_nosaukums_style = '';
            if ($pieteikums['Statuss'] == 1) {
                $stat_nosaukums_style = 'style="color: #f99f38;"';
            } elseif ($pieteikums['Statuss'] == 2) {
                $stat_nosaukums_style = 'style="color: #087e14;"';
            }
            echo "
            <tr>
                <td>{$pieteikums['Vards']}</td>
                <td>{$pieteikums['Uzvards']}</td>
                <td>{$pieteikums['Talrunis']}</td>
                <td>{$pieteikums['Epasts']}</td>
                <td>{$pieteikums['Izv_Marsruts']}</td>
                <td>{$pieteikums['Pilseta']}</td>
                <td>{$pieteikums['Cel_datums']}</td>
                <td>{$pieteikums['Piet_Datums']}</td>
                <td $stat_nosaukums_style>{$pieteikums['Stat_nosaukums']}</td>
                <td>
                    <form method='POST' action='rediget_piet.php'>
                        <button type='submit' name='apskatit' value='{$pieteikums['Klienta_ID']}'><i class='fas fa-edit'></i></button>
                    </form>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
</div>
<?php 
require "footer.php";
?>