Overzicht Vlucht-Booking Vluchtnummer <input type="" id=""> <input type="submit" value="Tonen">
<?php echo '<button onclick="window.location.href=\'Nieuwe-Booking.php\'">Nieuw Booking</button>';
try {
    $pdo = new PDO('mysql:host=localhost;dbname=vlucht-booking', 'root', '');
    $query = "SELECT Passagier.*, Contact.adres, Contact.email, Vlucht.bestemming, Vlucht.vertrekdatum, Vlucht.vertrektijd FROM Passagier 
    INNER JOIN Contact ON Passagier.passagier_id  = Contact.passagier_id 
    INNER JOIN Instapkart ON Passagier.passagier_id = Instapkart.passagier_id 
    INNER JOIN Vlucht ON Instapkart.vlucht_id = Vlucht.vlucht_id";



    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $passagier = $stmt->fetchAll();

    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Naam</th>';
    echo '<th>Adres</th>';
    echo '<th>Email</th>';
    echo '<th>Bestemming</th>';
    echo '<th>Vertrekdatum</th>';
    echo '<th>Vertrektijd</th>';
    echo '</tr>';
    foreach ($passagier as $passagier) {
        echo '<tr>';
        echo '<td>' . $passagier['first_name'] . ' ' . $passagier['last_name'] . '</td>';
        echo '<td>' . $passagier['adres'] . '</td>';
        echo '<td>' . $passagier['email'] . '</td>';
        echo '<td>' . $passagier['bestemming'] . '</td>';
        echo '<td>' . $passagier['vertrekdatum'] . '</td>';
        echo '<td>' . $passagier['vertrektijd'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
