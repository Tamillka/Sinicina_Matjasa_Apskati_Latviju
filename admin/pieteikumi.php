<?php 
require "header.php";
$page = "pieteikumi";

$ierakstu_skaits = mysqli_num_rows(mysqli_query($savienojums, "SELECT * FROM apskati_klienti"));
$ierakstu_uz_lapu = 5;
$lapu_skaits = ceil($ierakstu_skaits / $ierakstu_uz_lapu);
$pasreizeja_lapa = isset($_GET['lapa']) ? $_GET['lapa'] : 1;
$sakuma_ieraksta_numurs = ($pasreizeja_lapa - 1) * $ierakstu_uz_lapu;
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
        $piet_SQL = "SELECT * FROM apskati_klienti k JOIN apskati_statuss s ON k.Statuss = s.Statuss_id ORDER BY Piet_Datums DESC LIMIT $sakuma_ieraksta_numurs, $ierakstu_uz_lapu";
        $atlasa_piet_SQL = mysqli_query($savienojums, $piet_SQL);
        while($pieteikums = mysqli_fetch_array($atlasa_piet_SQL)) {
            $stat_nosaukums_style = '';

            // Check if the travel date is in the past
            $celojuma_datums = strtotime($pieteikums['Cel_datums']);
            $sodienas_datums = strtotime(date('Y-m-d'));
            if ($celojuma_datums < $sodienas_datums) {
                // Update status in the database to 3 if travel date is in the past
                $update_sql = "UPDATE apskati_klienti SET Statuss = 3 WHERE Klienta_ID = " . $pieteikums['Klienta_ID'];
                mysqli_query($savienojums, $update_sql);

                // Update the status in the current row for display
                $pieteikums['Statuss'] = 3;
            }
            if ($pieteikums['Statuss'] == 1) {
                $stat_nosaukums_style = 'style="color: #f99f38;"';
            } elseif ($pieteikums['Statuss'] == 2) {
                $stat_nosaukums_style = 'style="color: #087e14;"';
            }
            elseif ($pieteikums['Statuss'] == 3) {
                $stat_nosaukums_style = 'style="color: red;"';
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
         <tr>
            <td colspan=10><?php for ($i = 1; $i <= $lapu_skaits; $i++) : ?>
                <a href="?lapa=<?php echo $i; ?>" id="parslegsana"><?php echo $i; ?></a>
            <?php endfor; ?> </td>
            </tr>
    </table>
</div>
<?php 
require "footer.php";
?>