<?php
// Autorizācija:
if(isset($_POST["ielogoties"])){
    session_start();
    $lietotajvards = mysqli_real_escape_string($savienojums, $_POST["lietotajvards"]);
    $parole = mysqli_real_escape_string($savienojums, $_POST["parole"]);
    $sql = "SELECT * FROM apskati_lietotaji WHERE Lietotajvards = '$lietotajvards'";
    $rezultats = mysqli_query($savienojums, $sql);

    if(mysqli_num_rows($rezultats)==1){
        while($user = mysqli_fetch_array($rezultats)){
            if(password_verify($parole, $user["Parole"])){
                $_SESSION["lietotajvardsTAM"] = $user["Lietotajvards"];
                $_SESSION["Liet_Stat"] = $user["Liet_Stat"]; // Store user status in session
                header("location:./admin/index.php");
            }else{
                echo "Nepareizs lietotāvards vai parole!";
            }
        }
    }else{
        echo "Nepareizs lietotāvards vai parole!";
    }
}

// Paroles maiņa:
if (isset($_POST['change_password'])) {
    $lietotajvards = $_SESSION['lietotajvardsTAM'];
    $currentPassword = mysqli_real_escape_string($savienojums, $_POST['currentpassword']);
    $newPassword = mysqli_real_escape_string($savienojums, $_POST['jauna']);
    $confirmNewPassword = mysqli_real_escape_string($savienojums, $_POST['jaunaatkartoti']);

    $sql = "SELECT * FROM apskati_lietotaji WHERE Lietotajvards = '$lietotajvards'";
    $rezultats = mysqli_query($savienojums, $sql);

    if (mysqli_num_rows($rezultats) == 1) {
        $user = mysqli_fetch_array($rezultats);
        if (password_verify($currentPassword, $user['Parole'])) {
            if ($newPassword == $confirmNewPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql = "UPDATE apskati_lietotaji SET Parole = '$hashedPassword' WHERE Lietotajvards = '$lietotajvards'";

                if (mysqli_query($savienojums, $updateSql)) {
                    echo "<div class='infoo green'>Parole veiksmīgi nomainīta! </div>";
                } else {
                    echo "Kļūda mainot paroli: " . mysqli_error($savienojums);
                }
            } else {
                echo "Jaunās paroles nesakrīt!";
            }
        } else {
            echo "Nepareiza pašreizējā parole!";
        }
    } else {
        echo "Lietotājs neeksistē!";
    }
}
?>