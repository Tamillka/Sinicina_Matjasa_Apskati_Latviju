<?php
session_start();
if (!isset($_SESSION['lietotajvardsTAM'])) {
    header("location:../login.php");
    exit();
}

require "../assets/connect_db.php";

// Check user status
$lietotajvards = $_SESSION['lietotajvardsTAM'];
$sql = "SELECT Liet_Stat FROM apskati_lietotaji WHERE Lietotajvards = ?";
$stmt = $savienojums->prepare($sql);
$stmt->bind_param('s', $lietotajvards);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user['Liet_Stat'] != 0 && basename($_SERVER['PHP_SELF']) == 'administratori.php') {
    header("location:./");
    exit();
}

$_SESSION['Liet_Stat'] = $user['Liet_Stat'];
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="../assets/script_admin.js" defer></script>
    <title>Apskati Latviju</title>
</head>
<body>
    <div class="aside">
        <h1>Administrēšana</h1>
        <aside>
            <nav class="navbar">
                <div class="user">
                    <i class="fas fa-user"></i>
                    <p class="logout">
                        <?php echo $_SESSION['lietotajvardsTAM']; ?>
                        <a href="logout.php"><i class="fas fa-power-off"></i></a>
                    </p>
                    <button type="button" name="change" class="btn" onclick="toggleForm()">Mainīt paroli <i class="fas fa-caret-down"></i></button>
                    <div class="infoo">
                        <?php require "login_operations.php"; ?>
                    </div>
                    <form method="POST" class="hidden" id="passwordForm">
                        <input type="password" name="currentpassword" placeholder="Pašreizējā parole" required>
                        <input type="password" name="jauna" placeholder="Jauna parole" required>
                        <input type="password" name="jaunaatkartoti" placeholder="Atkārtoti" required><br>
                        <button type="submit" name="change_password" class="btn">Saglabāt</button>
                    </form>
                </div>
                <a href="./" class="<?php echo ($page == 'sakums' ? 'current' : ''); ?>">Sākumlapa</a>
                <a href="pieteikumi.php" class="<?php echo ($page == 'pieteikumi' ? 'current' : ''); ?>">Pieteikumi</a>
                <a href="aktualitates.php" class="<?php echo ($page == 'aktualitates' ? 'current' : ''); ?>">Aktualitātes</a>
                <a href="piedavajumi.php" class="<?php echo ($page == 'piedavajumi' ? 'current' : ''); ?>">Piedāvājumi</a>
                <?php if ($_SESSION['Liet_Stat'] == 0): ?>
                    <a href="administratori.php" class="<?php echo ($page == 'administratori' ? 'current' : ''); ?>">Administratori</a>
                <?php endif; ?>
                <a href="../index.php" class="btn log"><i class="fas fa-sign-out-alt"></i> Uz galveno lapu</a>
            </nav>
        </aside>
    </div>
    <div id="menu-btn" class="fas fa-bars"></div>