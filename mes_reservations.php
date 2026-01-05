<?php
session_start();

if(!isset($_SESSION['id_client'])){
    header('Location: connexion.php');
    exit();
}

require_once 'classes/Database.php';
$db = new Database();
$pdo = $db->getPdo();

$stmt = $pdo->prepare("SELECT reservations.*, vehicules.modele, vehicules.prix_jour 
                      FROM reservations 
                      INNER JOIN vehicules ON reservations.vehicule_id_reserv = vehicules.id_vehicule 
                      WHERE reservations.client_id_reserv = ?");

$stmt->execute([$_SESSION['id_client']]);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Réservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Mes Réservations</h1>
        
        <?php if(count($reservations) == 0): ?>
            <p>Vous n'avez aucune réservation.</p>
        <?php else: ?>
            
            <?php foreach($reservations as $reservation): ?>
                <div class="bg-white p-6 rounded-lg shadow mb-4">
                    <h3 class="text-xl font-bold"><?php echo htmlspecialchars($reservation['modele']); ?></h3>
                    <p>Du <?php echo htmlspecialchars($reservation['date_debut']); ?> au <?php echo htmlspecialchars($reservation['date_fin']); ?></p>
                    <p>Départ : <?php echo htmlspecialchars($reservation['lieu_depart']); ?></p>
                    <p>Retour : <?php echo htmlspecialchars($reservation['lieu_retour']); ?></p>
                    <p>Statut : <?php echo htmlspecialchars($reservation['statut']); ?></p>
                </div>
            <?php endforeach; ?>
            
        <?php endif; ?>
        
        <a href="vehicules.php" class="text-blue-600 hover:underline">← Retour aux véhicules</a>
        
    </div>
    
</body>
</html>