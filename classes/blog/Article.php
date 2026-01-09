<?php
namespace App\Blog;

class Article {
    private $id;
    private $client_id_ar;
    private $id_theme;
    private $titre;
    private $contenu;
    private $tag;
    private $date_publication;
    private $statut;

    public function __construct($id, $client_id_ar, $id_theme, $titre, $contenu, $tag, $date_publication, $statut) {
        $this->id = $id;
        $this->client_id_ar = $client_id_ar;
        $this->id_theme = $id_theme;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->tag = $tag;
        $this->date_publication = $date_publication;
        $this->statut = $statut;
    }

    // Getters oo Setters
    public function getId() { 
        return $this->id; }
    public function setId($id) { 
        $this->id = $id; }

    public function getTitre() { 
        return $this->titre; }
    public function setTitre($titre) {
         $this->titre = $titre; }

    public function getContenu() {
         return $this->contenu; }
    public function setContenu($contenu) { 
        $this->contenu = $contenu; }

            public function getTag() {
         return $this->tag; }

    public function setTag($tag) { 
        $this->tag = $tag; }

            public function getDate_publication() {
         return $this->date_publication; }
    public function setdate_publication($date_publication) { 
        $this->date_publication = $date_publication; }

            public function getStatut() {
         return $this->contenu; }
    public function setStatut($statut) { 
        $this->statut = $statut; }

        public static function listerParTheme($pdo, $idTheme) {

    $sql = "SELECT * FROM articles WHERE id_theme = ?";
    
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([$idTheme]);
    
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $articles = [];
    foreach ($resultats as $row) {
        $articles[] = new Article(
            $row['id'],
            $row['id_client'],
            $row['id_theme'],
            $row['titre'],
            $row['contenu'],
            $row['tags'],
            $row['date_publication'],
            $row['statut']
        );
    }
    
    return $articles;
}

public static function trouverParId($pdo, $id) {
    $sql = "SELECT * FROM articles WHERE id = ?";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([$id]);
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        return new Article(
            $row['id'],
            $row['id_client'],
            $row['id_theme'],
            $row['titre'],
            $row['contenu'],
            $row['tags'],
            $row['date_publication'],
            $row['statut']
        );
    }
        return null;
}


}