<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jour08";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer les informations des étudiants qui ont moins de 18 ans
    $sql = "SELECT *, DATEDIFF(CURDATE(), date_naissance) / 365 AS age FROM etudiants HAVING age < 18";
    $result = $conn->query($sql);

    // Affichage du tableau HTML
    echo "<table>";
    
    // En-tête du tableau avec les noms des champs
    echo "<tr>";
    echo "<th>Prénom</th>";
    echo "<th>Nom</th>";
    echo "<th>naissance</th>";
    // Ajoutez ici d'autres champs que vous souhaitez afficher
    echo "</tr>";

    // Parcourir les résultats de la requête
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['naissance'] . "</td>";
        // Ajoutez ici d'autres champs que vous souhaitez afficher
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

