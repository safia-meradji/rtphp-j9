<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jour08";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer l'ensemble des informations de la table étudiants
    $sql = "SELECT * FROM etudiants";
    $result = $conn->query($sql);

    // Affichage du tableau HTML
    echo "<table>";
    
    // En-tête du tableau avec les noms des champs
    echo "<thead>";
    echo "<tr>";
    echo "<th>Prénom</th>";
    echo "<th>Nom</th>";
    echo "<th>naissance</th>";
    // Ajoutez ici d'autres champs que vous souhaitez afficher
    echo "</tr>";
    echo "</thead>";

    // Corps du tableau avec les données des étudiants
    echo "<tbody>";
    // Parcourir les résultats de la requête
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['naissance'] . "</td>";
        // Ajoutez ici d'autres champs que vous souhaitez afficher
        echo "</tr>";
    }
    echo "</tbody>";

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
