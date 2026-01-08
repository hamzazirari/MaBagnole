<?php
namespace App\Blog;

class Commentaire {
    private $id;
    private $id_client;
    private $id_article;
    private $contenu;
    private $date_commentaire;
    private $soft_deleted;

public function __construct($id, $id_client, $id_article, $contenu, $date_commentaire, $soft_deleted) {
    $this->id = $id;
    $this->id_client = $id_client;
    $this->id_article = $id_article;
    $this->contenu = $contenu;
    $this->date_commentaire = $date_commentaire;
    $this->soft_deleted = $soft_deleted;
}

    // Getters & Setters
    public function getId() {
         return $this->id; }

    public function setId($id) {
         $this->id = $id; }

    public function getContenu() {
         return $this->contenu; }

    public function setContenu($contenu) {
         $this->contenu = $contenu; }


         public function getDateCommentaire() {
    return $this->date_commentaire;
}

public function setDateCommentaire($date_commentaire) {
    $this->date_commentaire = $date_commentaire;
}

public function getSoftDeleted() {
    return $this->soft_deleted;
}

public function setSoftDeleted($soft_deleted) {
    $this->soft_deleted = $soft_deleted;
}

public static function listerParArticle($pdo, $idArticle) {

    $sql = "SELECT * FROM commentaires WHERE id_article = ? AND soft_deleted = 0";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idArticle]);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $commentaires = [];
    foreach ($resultats as $row) {
        $commentaires[] = new Commentaire(
            $row['id'],
            $row['id_client'],
            $row['id_article'],
            $row['contenu'],
            $row['date_commentaire'],
            $row['soft_deleted']
        );
    }
    
    return $commentaires;
}

}