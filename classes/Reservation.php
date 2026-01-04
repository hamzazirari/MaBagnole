<?php
class Reservation {
    private $id;
    private $client_id;
    private $vehicule_id;
    private $date_debut;
    private $date_fin;
    private $lieu_depart;
    private $lieu_retour;
    private $statut;

    public function __construct($id, $client_id, $vehicule_id, $date_debut, $date_fin, $lieu_depart, $lieu_retour, $statut) {
        $this->id = $id;
        $this->client_id = $client_id;
        $this->vehicule_id = $vehicule_id;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->lieu_depart = $lieu_depart;
        $this->lieu_retour = $lieu_retour;
        $this->statut = $statut;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getClientId() {
        return $this->client_id;
    }

    public function getVehiculeId() {
        return $this->vehicule_id;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function getLieuDepart() {
        return $this->lieu_depart;
    }

    public function getLieuRetour() {
        return $this->lieu_retour;
    }

    public function getStatut() {
        return $this->statut;
    }

    // Setters
    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }
}
?>