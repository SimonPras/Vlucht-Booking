<?php
if (isset($_POST['voornaam']) && isset($_POST['achternaam']) && isset($_POST['geboortedatum'])  && isset($_POST['adres'])  && isset($_POST['woonplaats'])  && isset($_POST['postcode'])  && isset($_POST['email']) && isset($_POST['mobiel']) && isset($_POST['vluchtnummer']) && isset($_POST['bestemming']) && isset($_POST['vertrekdatum']) && isset($_POST['vertrektijd'])) {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];
    $postcode = $_POST['postcode'];
    $email = $_POST['email'];
    $mobiel = $_POST['mobiel'];
    $vluchtnummer = $_POST['vluchtnummer'];
    $bestemming = $_POST['bestemming'];
    $vertrekdatum = $_POST['vertrekdatum'];
    $vertrektijd = $_POST['vertrektijd'];
    $query = "INSERT INTO passagier (voornaam, achternaam, geboortedatum) VALUES (:voornaam, :achternaam, :geboortedatum)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':voornaam' => $voornaam, ':achternaam' => $achternaam, ':geboortedatum' => $geboortedatum));
    $lastInsertId = $pdo->lastInsertId();
    $query = "INSERT INTO contact (passagier_id, adres, woonplaats, postcode, email, mobiel) VALUES (:passagier_id, :adres, :woonplaats, :postcode, :email, :mobiel)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':passagier_id' => $lastInsertId, ':adres' => $adres, ':woonplaats' => $woonplaats, ':postcode' => $postcode, ':email' => $email, ':mobiel' => $mobiel));
    $query = "INSERT INTO vlucht (vluchtnummer, bestemming, vertrekdatum, vertrektijd) VALUES (:vluchtnummer, :bestemming, :vertrekdatum, :vertrektijd)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':vluchtnummer' => $vluchtnummer, ':bestemming' => $bestemming, ':vertrekdatum' => $vertrekdatum, ':vertrektijd' => $vertrektijd));
    $lastInsertIdVlucht = $pdo->lastInsertId();
    $query = "INSERT INTO instapkart (passagier_id, vlucht_id) VALUES (:passagier_id, :vlucht_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':passagier_id' => $lastInsertId, ':vlucht_id' => $lastInsertIdVlucht));
}
?>

<form action="index.php" method="post">
    <label for="voornaam">Voornaam:</label>
    <input type="text" name="voornaam" id="voornaam"><br><br>

    <label for="achternaam">Achternaam:</label>
    <input type="text" name="achternaam" id="achternaam"><br><br>

    <label for="geboortedatum">Geboortedatum:</label>
    <input type="date" name="geboortedatum" id="geboortedatum"><br><br>

    <label for="adres">Adres:</label>
    <input type="text" name="adres" id="adres"><br><br>

    <label for="woonplaats">Woonplaats:</label>
    <input type="text" name="woonplaats" id="woonplaats"><br><br>

    <label for="postcode">Postcode:</label>
    <input type="text" name="postcode" id="postcode"><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email"><br><br>

    <label for="mobiel">Mobiel:</label>
    <input type="text" name="mobiel" id="mobiel"><br><br>

    <label for="vluchtnummer">Vluchtnummer:</label>
    <input type="text" name="vluchtnummer" id="vluchtnummer"><br><br>

    <label for="bestemming">Bestemming:</label>
    <input type="text" name="bestemming" id="bestemming"><br><br>

    <label for="vertrekdatum">Vertrekdatum:</label>
    <input type="date" name="vertrekdatum" id="vertrekdatum"><br><br>

    <label for="vertrektijd">Vertrektijd:</label>
    <input type="time" name="vertrektijd" id="vertrektijd"><br><br>

    <input type="submit" value="Submit">
</form>