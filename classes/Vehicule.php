<?php
class Vehicule {
    private $id;
    private $modele;
    private $immatriculation;
    private $prix_jour;
    private $categorie_id;
    private $disponible;

    public function __construct($id, $modele, $immatriculation, $prix_jour, $categorie_id, $disponible) {
        $this->id = $id;
        $this->modele = $modele;
        $this->immatriculation = $immatriculation;
        $this->prix_jour = $prix_jour;
        $this->categorie_id = $categorie_id;
        $this->disponible = $disponible;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function getPrixJour() {
        return $this->prix_jour;
    }

    public function getCategorieId() {
        return $this->categorie_id;
    }

    public function isDisponible() {
        return $this->disponible;
    }

    // Setters
    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setImmatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;
    }

    public function setPrixJour($prix_jour) {
        $this->prix_jour = $prix_jour;
    }

    public function setCategorieId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }

    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }


// Rechercher par modèle
public static function rechercherParModele($pdo, $recherche) {
    $sql = "SELECT vehicules.*, categories.nom AS nom_categorie 
            FROM vehicules 
            INNER JOIN categories ON vehicules.categorie_id = categories.id_categorie 
            WHERE vehicules.disponible = 1 AND vehicules.modele LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$recherche%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Filtrer par catégorie
public static function filtrerParCategorie($pdo, $categorie_id) {
    $sql = "SELECT vehicules.*, categories.nom AS nom_categorie 
            FROM vehicules 
            INNER JOIN categories ON vehicules.categorie_id = categories.id_categorie 
            WHERE vehicules.disponible = 1 AND vehicules.categorie_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$categorie_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Lister avec pagination
public static function listerPagine($pdo, $limit, $offset) {
    
    $limit = (int)$limit;
    $offset = (int)$offset;
    
    $sql = "SELECT vehicules.*, categories.nom AS nom_categorie 
            FROM vehicules 
            INNER JOIN categories ON vehicules.categorie_id = categories.id_categorie 
            WHERE vehicules.disponible = 1 
            LIMIT $limit OFFSET $offset";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();  
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>