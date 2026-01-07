<?php
namespace App\Blog;

class Theme 
{
    private $id;
    private $titre;
    private $description;
    private $actif;

    public function __construct($id, $titre, $description, $actif) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->actif = $actif;
    }

    // Getters o Setters
    public function getId() { 
        return $this->id; }
    public function setId($id) { 
        $this->id = $id; }

    public function getTitre() {
         return $this->titre; }
    public function setTitre($titre) {
         $this->titre = $titre; }

    public function getDescription() {
         return $this->description; }
    public function setDescription($description) {
         $this->description = $description; }

    public function getActif() {
         return $this->actif; }
    public function setActif($actif) {
         $this->actif = $actif; }
}

public static function listerTousActifs($pdo) {
    $sql = "SELECT * FROM themes WHERE actif = 1";
    $stmt = $pdo->query($sql);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $themes = [];
    foreach ($resultats as $row) {
        $themes[] = new Theme(
            $row['id'],
            $row['titre'],
            $row['description'],
            $row['actif']
        );
    }
    return $themes;
}