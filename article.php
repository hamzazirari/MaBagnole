<?php
session_start();

require_once 'classes/blog/Article.php';
require_once 'classes/Database.php';

use App\Blog\Article;

$database = new Database();
$pdo = $database->getPdo();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: blog.php');
    exit();
}

$articleId = (int)$_GET['id'];

$article = Article::trouverParId($pdo, $articleId);

if (!$article) {
    header('Location: blog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['titre']) ?> - Mon Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    
    <!-- HEADER -->
    <header class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold">📚 Mon Blog</h1>
                <a href="blog.php" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition">
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
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    <?= htmlspecialchars($article['titre']) ?>
                </h1>
                
                <div class="flex flex-wrap items-center gap-4 text-gray-600">
                    <!-- Date de publication -->
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">📅</span>
                        <span><?= date('d/m/Y à H:i', strtotime($article['date_publication'])) ?></span>
                    </div>
                    
                    <!-- Auteur -->
                    <?php if (isset($article['auteur_nom'])): ?>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl">✍️</span>
                            <span>Par <?= htmlspecialchars($article['auteur_prenom'] . ' ' . $article['auteur_nom']) ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Thème -->
                    <?php if (isset($article['theme_titre'])): ?>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl">🎯</span>
                            <a href="blog.php?id_theme=<?= $article['id_theme'] ?>" 
                               class="text-blue-600 hover:text-blue-800 font-semibold">
                                <?= htmlspecialchars($article['theme_titre']) ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Contenu de l'article -->
            <div class="prose prose-lg max-w-none">
                <div class="text-gray-800 leading-relaxed whitespace-pre-line">
                    <?= nl2br(htmlspecialchars($article['contenu'])) ?>
                </div>
            </div>
            
        </article>
        
        <!-- SECTION COMMENTAIRES (à implémenter au Jour 4) -->
        <section class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">💬 Commentaires</h2>
            <p class="text-gray-600">Les commentaires seront ajoutés au Jour 4 !</p>
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