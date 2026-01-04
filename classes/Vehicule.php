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
}
?>