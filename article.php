<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - Mon Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    
    <!-- HEADER -->
    <header class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">📚 Mon Blog</h1>
                    <p class="text-blue-100">Lecture d'article</p>
                </div>
                <a href="blog.php" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition font-semibold">
                    ← Retour au blog
                </a>
            </div>
        </div>
    </header>
    
    <!-- CONTAINER PRINCIPAL -->
    <div class="container mx-auto px-4 py-8">
        
        <!-- ARTICLE COMPLET -->
        <article class="bg-white rounded-lg shadow-lg p-8 mb-8">
            
            <!-- En-tête de l'article -->
            <div class="mb-6 pb-6 border-b border-gray-200">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Titre de l'article</h1>
                
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                    <span>👤 Par <strong>Nom Auteur</strong></span>
                    <span>📅 Publié le <strong>01/01/2024</strong></span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">🏷️ Thème: Technologie</span>
                </div>
            </div>
            
            <!-- Contenu de l'article -->
            <div class="prose max-w-none mb-6">
                <p class="text-gray-700 text-lg leading-relaxed">
                    Contenu complet de l'article sera affiché ici...
                </p>
            </div>
            
            <!-- Tags -->
            <div class="flex flex-wrap gap-2 pt-6 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Tags:</span>
                <span class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full">tag1</span>
                <span class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full">tag2</span>
            </div>
        </article>
        
        <!-- SECTION COMMENTAIRES -->
        <section class="bg-white rounded-lg shadow-lg p-8">
            
            <h2 class="text-2xl font-bold text-gray-900 mb-6">💬 Commentaires (5)</h2>
            
            <!-- Liste des commentaires -->
            <div class="space-y-6 mb-8">
                
                <!-- Exemple de commentaire (à répéter avec PHP) -->
                <div class="border-l-4 border-blue-500 bg-gray-50 p-4 rounded-r-lg">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-semibold text-gray-800">👤 Nom Utilisateur</span>
                        <span class="text-sm text-gray-500">📅 01/01/2024 à 14:30</span>
                    </div>
                    <p class="text-gray-700">
                        Contenu du commentaire sera affiché ici...
                    </p>
                </div>
                
            </div>
            
            <!-- FORMULAIRE D'AJOUT DE COMMENTAIRE -->
            <div class="border-t border-gray-200 pt-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">✍️ Ajouter un commentaire</h3>
                
                <!-- Formulaire (visible si connecté) -->
                <form method="POST" action="article.php?id=1" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Votre commentaire</label>
                        <textarea 
                            name="contenu" 
                            rows="4" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Écrivez votre commentaire..."
                            required></textarea>
                    </div>
                    
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                        📤 Publier le commentaire
                    </button>
                </form>
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