<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jour08";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer les informations des étudiants dont le prénom commence par "T"
    $sql = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
    $result = $conn->query($sql);

    // Affichage du tableau HTML avec cadre
    echo "<table style='border-collapse: collapse;'>";
    
    // En-tête du tableau avec les noms des champs
    echo "<tr>";
    echo "<th style='border: 1px solid black;'>Prénom</th>";
    echo "<th style='border: 1px solid black;'>Nom</th>";
    echo "<th style='border: 1px solid black;'>Naissance</th>";
    // Ajoutez ici d'autres champs que vous souhaitez afficher
    echo "</tr>";

    // Parcourir les résultats de la requête
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row['naissance'] . "</td>";
        // Ajoutez ici d'autres champs que vous souhaitez afficher
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
