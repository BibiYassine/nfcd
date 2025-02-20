<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Profile-NFCD</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="scroll.css">
    <link rel="stylesheet" href="sidenav.css"> 
    <link rel="shortcut icon" href="images/prof.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>

<?php
include 'connect.php';
session_start();
include 'functies/sideMenu.php';
include 'functies/functies.php';

onderhoudsModus();
// controleerAdmin($mysqli);

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['email'])) {
    header("Location: login");
    exit();
}

// Controleer of de gegevens zijn bijgewerkt
if (!isset($_SESSION['updated'])) {
    $_SESSION['updated'] = false;
}



// Haal de gegevens van de ingelogde gebruiker op
$stmt = $mysqli->prepare("SELECT * FROM tblklant WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

for($row=0; $row < count($user); $row++){
    echo "<tr>";
    $_SESSION['klantnaam'] = $user['klantnaam'];
}

// Verwerk het formulier als het is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Controleer of het formulier is ingediend
    if (isset($_POST['action']) && $_POST['action'] === 'update') { 
        $nieuweNaam = $_POST['klantnaam'];
        $nieuwEmail = $_POST['email'];
        $nieuwAdres = $_POST['adres'];
        $nieuwPostcode = $_POST['postcode'];
        $nieuwPlaats = $_POST['plaats'];
        $nieuwTelefoonnummer = $_POST['telefoonnummer'];
        
        // Update de gegevens in de database
        $updateStmt = $mysqli->prepare("UPDATE tblklant SET klantnaam = ?, email = ?, adres = ?, postcode = ?, plaats = ?, telefoonnummer = ? WHERE email = ?");
        $updateStmt->bind_param("sssssss", $nieuweNaam, $nieuwEmail, $nieuwAdres, $nieuwPostcode, $nieuwPlaats, $nieuwTelefoonnummer, $_SESSION['email']);
        $updateStmt->execute();
        
        // Verander de sessienaam als de gebruikersnaam is aangepast
        $_SESSION['klantnaam'] = $nieuweNaam;
        
        // Stel de sessievariabele in om te markeren dat de gegevens zijn bijgewerkt
        $_SESSION['updated'] = true;
        
        // Voeg JavaScript toe om de pagina zonder melding te herladen
        echo '<meta http-equiv="refresh" content="0">';
    } elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Verwijder het account uit de database
        $deleteStmt = $mysqli->prepare("DELETE FROM tblklant WHERE klantnaam = ?");
        $deleteStmt->bind_param("s", $_SESSION['klantnaam']);
        $deleteStmt->execute();

        // Vernietig de sessie en log de gebruiker uit
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

// Controleer of de pagina net is herladen na een update
if ($_SESSION['updated'] === true) {
    echo '<p class="success-message">Je gegevens zijn succesvol bijgewerkt!</p>';
    $_SESSION['updated'] = false;
}

// Formulier voor gegevensbewerking met huidige waarden in de velden
echo '<form method="POST" action="">';
echo '<label for="klantnaam">Naam:</label>';
echo '<input type="text" id="klantnaam" name="klantnaam" value="' . htmlspecialchars($user['klantnaam']) . '" placeholder="Voer uw naam in"><br>';

echo '<label for="email">Email:</label>';
echo '<input type="text" id="email" name="email" value="' . htmlspecialchars($user['email']) . '" placeholder="Voer uw email in"><br>';

echo '<label for="adres">Adres:</label>';
echo '<input type="text" id="adres" name="adres" value="' . htmlspecialchars($user['adres']) . '" placeholder="Voer uw adres in"><br>';

echo '<label for="postcode">Postcode:</label>';
echo '<input type="text" id="postcode" name="postcode" value="' . htmlspecialchars($user['postcode']) . '" placeholder="Voer uw postcode in"><br>';

echo '<label for="plaats">Plaats:</label>';
echo '<input type="text" id="plaats" name="plaats" value="' . htmlspecialchars($user['plaats']) . '" placeholder="Voer uw plaats in"><br>';

echo '<label for="telefoonnummer">Telefoonnummer:</label>';
echo '<input type="text" id="telefoonnummer" name="telefoonnummer" value="' . htmlspecialchars($user['telefoonnummer']) . '" placeholder="Voer uw telefoonnummer in" required><br>';

echo '<input type="hidden" name="action" value="update">';
echo '<input type="submit" value="Wijzig gegevens">';
echo '</form>';

// delete knop 
echo '<form method="POST" action="" onsubmit="return confirmDelete();">';
echo '<input type="hidden" name="action" value="delete">';
echo '<input type="submit" value="Verwijder Account" style="color: red;">';
echo '</form>';

// loguit knop
echo '<form method="POST" action="logout">';
echo '<input type="submit" value="Log uit">';
echo '</form>';
?>

<script>
     function openNav() {
            document.getElementById("sidenav").style.width = "250px"; 
        }

        function closeNav() {
            document.getElementById("sidenav").style.width = "0"; 
        }

        AOS.init(); // Initialize animation library
function confirmDelete() {
    return confirm('Weet je zeker dat je je account wilt verwijderen?');

}
</script>

</body>
</html>