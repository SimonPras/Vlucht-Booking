<?php
$pdo = new PDO('mysql:host=localhost;dbname=vlucht-booking', 'root', '');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $column1 = $_POST['column1'];
    $column2 = $_POST['column2'];
    $column3 = $_POST['column3'];

    $query = "UPDATE passagier SET column1 = :column1, column2 = :column2, column3 = :column3 WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':column1' => $column1, ':column2' => $column2, ':column3' => $column3, ':id' => $id));
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