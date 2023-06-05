<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jour08";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer le prénom, le nom et la date de naissance des étudiants de sexe féminin
    $sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'femme'";
    $result = $conn->query($sql);

    // Affichage du tableau HTML avec cadre
    echo "<table style='border-collapse: collapse;'>";
    echo "<thead><tr>";
    echo "<th style='border: 1px solid black;'>Prénom</th>";
    echo "<th style='border: 1px solid black;'>Nom</th>";
    echo "<th style='border: 1px solid black;'>Naissance</th>";
    echo "</tr></thead>";
    echo "<tbody>";

    // Parcourir les résultats de la requête
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black;'>" . $row['naissance'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
   
 