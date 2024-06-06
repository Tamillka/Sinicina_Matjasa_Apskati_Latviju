<?php
    #1. statistika
    $pieteikumi_SQL = "SELECT COUNT(Klienta_ID) FROM apskati_klienti ";
    $atlasa_pieteikumi = mysqli_query($savienojums, $pieteikumi_SQL);

     while($ieraksts = mysqli_fetch_array($atlasa_pieteikumi)){
        $pieteikumi = "{$ieraksts['COUNT(Klienta_ID)']}";
     }

      #2. statistika
    $aktualitates_SQL = "SELECT COUNT(Aktualitates_ID) FROM apskati_aktualitates";
    $atlasa_aktualitates = mysqli_query($savienojums, $aktualitates_SQL);

     while($ieraksts = mysqli_fetch_array($atlasa_aktualitates)){
        $aktualitates = "{$ieraksts['COUNT(Aktualitates_ID)']}";
     }

      #3. statistika
    $piedavajumi_SQL = "SELECT COUNT(PiedavajumsID) FROM apskati_piedavajumi";
    $atlasa_piedavajumi = mysqli_query($savienojums, $piedavajumi_SQL);

     while($ieraksts = mysqli_fetch_array($atlasa_piedavajumi)){
        $piedavajumi = "{$ieraksts['COUNT(PiedavajumsID)']}";
     }

      #4. statistika
    $administratori_SQL = "SELECT COUNT(LietotajsID) FROM apskati_lietotaji WHERE Liet_Stat=0";
    $atlasa_administratori = mysqli_query($savienojums, $administratori_SQL);

     while($ieraksts = mysqli_fetch_array($atlasa_administratori)){
        $administratori = "{$ieraksts['COUNT(LietotajsID)']}";
     }
     
        #5. statistika
    $moderatori_SQL = "SELECT COUNT(LietotajsID) FROM apskati_lietotaji WHERE Liet_Stat=1";
    $atlasa_moderatori = mysqli_query($savienojums, $moderatori_SQL);

     while($ieraksts = mysqli_fetch_array($atlasa_moderatori)){
        $moderatori = "{$ieraksts['COUNT(LietotajsID)']}";
     }
     ?>