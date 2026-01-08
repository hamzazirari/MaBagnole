<?php

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Explorer les thèmes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    
    <!-- HEADER -->
    <header class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold">📚 Mon Blog</h1>
            <p class="text-blue-100">Découvrez nos articles par thèmes</p>
        </div>
    </header>
    
    <!-- CONTAINER PRINCIPAL -->
    <div class="container mx-auto px-4 py-8">
        
        <!-- BARRE DE RECHERCHE -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="blog.php" class="flex gap-4">
                <input type="text" 
                       name="recherche" 
                       placeholder="🔍 Rechercher un article..." 
                       class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="<?= isset($_GET['recherche']) ? htmlspecialchars($_GET['recherche']) : '' ?>">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Rechercher
                </button>
            </form>
        </div>
        
        <!-- SECTION THÈMES -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">🎯 Thèmes disponibles</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- LES THÈMES SERONT AFFICHÉS ICI EN PHP -->
                <!-- Exemple de card thème (à répéter avec PHP) -->
                <a href="blog.php?id_theme=1" class="block">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 h-full border-l-4 border-blue-500">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Nom du thème</h3>
                        <p class="text-gray-600">Description du thème...</p>
                        <span class="inline-block mt-4 text-blue-600 font-semibold">Voir les articles →</span>
                    </div>
                </a>
            </div>
        </section>
        
        <!-- SECTION ARTICLES (affichée si un thème est sélectionné) -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">📝 Articles</h2>
            
            <div class="space-y-6">
                <!-- LES ARTICLES SERONT AFFICHÉS ICI EN PHP -->
                <!-- Exemple de card article (à répéter avec PHP) -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Titre de l'article</h3>
                        <span class="text-sm text-gray-500">📅 01/01/2024</span>
                    </div>
                    <p class="text-gray-600 mb-4">Extrait du contenu de l'article...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">🏷️ Tag</span>
                        <a href="article.php?id=1" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Lire la suite →
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    
    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white mt-12 py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Mon Blog - Tous droits réservés</p>
        </div>
    </footer>
    
</body>
</html>