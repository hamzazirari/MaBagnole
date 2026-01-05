<?php
session_start();

if(!isset($_SESSION['id_client'])){
    header('Location: connexion.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: vehicules.php');
    exit();
}

$id_vehicule = $_GET['id'];

require_once 'classes/Database.php';

$db = new Database();
$pdo = $db->getPdo();

$stmt = $pdo->prepare("SELECT vehicules.*,categories.nom AS nom_categorie,categories.description AS description_categorie
    FROM vehicules
    INNER JOIN categories ON vehicules.categorie_id = categories.id_categorie
    WHERE vehicules.id_vehicule = ?");

$stmt->execute([$id_vehicule]);
$vehicule = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$vehicule) {
    header('Location: vehicules.php');
    exit();
};
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails - <?php echo htmlspecialchars($vehicule['modele']); ?> - MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                </svg>
                <h1 class="text-2xl font-bold text-blue-600">MaBagnole</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="vehicules.php" class="text-gray-600 hover:text-blue-600 transition">
                    ← Retour aux véhicules
                </a>
                <span class="text-gray-700">
                    Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['nom']); ?></strong>
                </span>
                <a href="deconnexion.php" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Déconnexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        
        <div class="max-w-5xl mx-auto">
            
            <!-- Card Détails -->
            <div class="bg-white rounded-lg shadow-2xl overflow-hidden">
                
                <div class="md:flex">
                    
                    <!-- Image Section (Gauche) -->
                    <div class="md:w-1/2 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center p-12">
                        <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                        </svg>
                    </div>

                    <!-- Info Section (Droite) -->
                    <div class="md:w-1/2 p-8">
                        
                        <!-- Badge Catégorie -->
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm px-4 py-2 rounded-full font-semibold mb-4">
                            <?php echo htmlspecialchars($vehicule['nom_categorie']); ?>
                        </span>

                        <!-- Modèle -->
                        <h2 class="text-4xl font-bold text-gray-800 mb-4">
                            <?php echo htmlspecialchars($vehicule['modele']); ?>
                        </h2>

                        <!-- Disponibilité -->
                        <div class="flex items-center mb-6">
                            <span class="w-4 h-4 bg-green-500 rounded-full mr-3"></span>
                            <span class="text-green-600 font-semibold text-lg">Disponible à la location</span>
                        </div>

                        <!-- Prix -->
                        <div class="bg-blue-50 border-l-4 border-blue-600 p-4 mb-6">
                            <p class="text-gray-600 text-sm mb-1">Prix de location</p>
                            <p class="text-4xl font-bold text-blue-600">
                                <?php echo number_format($vehicule['prix_jour'], 2); ?> €
                                <span class="text-lg text-gray-500 font-normal">/jour</span>
                            </p>
                        </div>

                        <!-- Détails -->
                        <div class="space-y-4 mb-6">
                            
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-700">Immatriculation</p>
                                    <p class="text-gray-600"><?php echo htmlspecialchars($vehicule['immatriculation']); ?></p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-700">Catégorie</p>
                                    <p class="text-gray-600"><?php echo htmlspecialchars($vehicule['nom_categorie']); ?></p>
                                    <p class="text-sm text-gray-500 mt-1"><?php echo htmlspecialchars($vehicule['description_categorie']); ?></p>
                                </div>
                            </div>

                        </div>

                        <!-- Bouton Réserver -->
                       <!-- Formulaire de Réservation -->
<form action="reserver.php" method="POST" class="space-y-4">
    
    <input type="hidden" name="vehicule_id" value="<?php echo $vehicule['id_vehicule']; ?>">
    
    <div>
        <label class="block text-gray-700 font-semibold mb-2">Date de début</label>
        <input type="date" name="date_debut" required class="w-full px-4 py-3 border rounded-lg">
    </div>

    <div>
        <label class="block text-gray-700 font-semibold mb-2">Date de fin</label>
        <input type="date" name="date_fin" required class="w-full px-4 py-3 border rounded-lg">
    </div>

    <div>
        <label class="block text-gray-700 font-semibold mb-2">Lieu de départ</label>
        <input type="text" name="lieu_depart" required class="w-full px-4 py-3 border rounded-lg">
    </div>

    <div>
        <label class="block text-gray-700 font-semibold mb-2">Lieu de retour</label>
        <input type="text" name="lieu_retour" required class="w-full px-4 py-3 border rounded-lg">
    </div>

    <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-lg font-bold">
        Réserver
    </button>

</form>

                    </div>

                </div>

            </div>

            <!-- Section Informations Supplémentaires -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <h3 class="font-bold text-gray-800 mb-2">Assurance Incluse</h3>
                    <p class="text-sm text-gray-600">Tous nos véhicules sont assurés tous risques</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="font-bold text-gray-800 mb-2">Location Flexible</h3>
                    <p class="text-sm text-gray-600">Choisissez vos dates et lieux de prise en charge</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <h3 class="font-bold text-gray-800 mb-2">Assistance 24/7</h3>
                    <p class="text-sm text-gray-600">Une équipe disponible pour vous aider à tout moment</p>
                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">© 2025 MaBagnole - Location de véhicules</p>
            <div class="mt-4 space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition">À propos</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Contact</a>
                <a href="#" class="text-gray-400 hover:text-white transition">CGU</a>
            </div>
        </div>
    </footer>

</body>
</html>
