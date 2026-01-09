<?php

session_start();

require_once 'classes/blog/theme.php';
require_once 'classes/blog/article.php';
require_once 'classes/Database.php'; 

use App\Blog\Theme; 
use App\Blog\Article; 

$database = new Database();
$pdo = $database->getPdo();

$themes = Theme::listerTousActifs($pdo);

$themeSelectionne = isset($_GET['id_theme']) ? (int)$_GET['id_theme'] : null;

$articles = [];
if ($themeSelectionne) {
    $articles = Article::listerParTheme($pdo, $themeSelectionne);
}

$recherche = isset($_GET['recherche']) ? trim($_GET['recherche']) : '';
$articlesRecherche = [];
if (!empty($recherche)) {
    $articlesRecherche = Article::rechercherParTitre($pdo, $recherche);
}

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
        
        <!-- RÉSULTATS DE RECHERCHE ladar lrecherche -->
        <?php if (!empty($recherche)): ?>
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">🔍 Résultats pour "<?= htmlspecialchars($recherche) ?>"</h2>
                
                <?php if (empty($articlesRecherche)): ?>
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
                        Aucun article trouvé pour cette recherche.
                    </div>
                <?php else: ?>
                    <div class="space-y-6">
                        <?php foreach ($articlesRecherche as $article): ?>
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-gray-800">
                                        <a href="article.php?id=<?= $article['id'] ?>" class="hover:text-blue-600">
                                            <?= htmlspecialchars($article['titre']) ?>
                                        </a>
                                    </h3>
                                    <span class="text-sm text-gray-500">📅 <?= date('d/m/Y', strtotime($article['date_publication'])) ?></span>
                                </div>
                                <p class="text-gray-600 mb-4"><?= htmlspecialchars(substr($article['contenu'], 0, 200)) ?>...</p>
                                <div class="flex items-center justify-between">
                                    <?php if (!empty($article['tags'])): ?>
                                        <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">🏷️ <?= htmlspecialchars($article['tags']) ?></span>
                                    <?php endif; ?>
                                    <a href="article.php?id=<?= $article['id'] ?>" class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Lire la suite →
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        
        <!-- SECTION THÈMES -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">🎯 Thèmes disponibles</h2>
            
            <?php if (empty($themes)): ?>
                <p class="text-gray-600">Aucun thème disponible pour le moment.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($themes as $theme): ?>
                        <a href="blog.php?id_theme=<?= $theme['id'] ?>" class="block">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 h-full border-l-4 border-blue-500">
                                <h3 class="text-xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($theme['titre']) ?></h3>
                                <p class="text-gray-600"><?= htmlspecialchars($theme['description']) ?></p>
                                <span class="inline-block mt-4 text-blue-600 font-semibold">Voir les articles →</span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
        
        <?php if ($themeSelectionne): ?>
            <section>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">📝 Articles du thème</h2>
                    <a href="blog.php" class="text-blue-600 hover:text-blue-800 font-semibold">← Retour aux thèmes</a>
                </div>
                
                <?php if (empty($articles)): ?>
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
                        Aucun article disponible pour ce thème.
                    </div>
                <?php else: ?>
                    <div class="space-y-6">
                        <?php foreach ($articles as $article): ?>
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-gray-800">
                                        <a href="article.php?id=<?= $article['id'] ?>" class="hover:text-blue-600">
                                            <?= htmlspecialchars($article['titre']) ?>
                                        </a>
                                    </h3>
                                    <span class="text-sm text-gray-500">📅 <?= date('d/m/Y', strtotime($article['date_publication'])) ?></span>
                                </div>
                                <p class="text-gray-600 mb-4"><?= htmlspecialchars(substr($article['contenu'], 0, 200)) ?>...</p>
                                <div class="flex items-center justify-between">
                                    <?php if (!empty($article['tags'])): ?>
                                        <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">🏷️ <?= htmlspecialchars($article['tags']) ?></span>
                                    <?php endif; ?>
                                    <a href="article.php?id=<?= $article['id'] ?>" class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Lire la suite →
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        
    </div>
    
    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white mt-12 py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Mon Blog - Tous droits réservés</p>
        </div>
    </footer>
    
</body>
</html>