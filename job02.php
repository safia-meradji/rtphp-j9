<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jour08";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer le nom et la capacité de chaque salle
    $sql = "SELECT nom, capacite FROM salles";
    $result = $conn->query($sql);

    // Affichage du tableau HTML
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>Nom</th>";
    echo "<th>Capacité</th>";
    echo "</tr></thead>";
    echo "<tbody>";

    // Parcourir les résultats de la requête
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['capacite'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
