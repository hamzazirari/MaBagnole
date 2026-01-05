<?php
class Reservation {
    private $id_reservation;
    private $client_id_reserv;      
    private $vehicule_id_reserv;    //
    private $date_debut;
    private $date_fin;
    private $lieu_depart;
    private $lieu_retour;
    private $statut;

    public function __construct($id_reservation, $client_id_reserv, $vehicule_id_reserv, $date_debut, $date_fin, $lieu_depart, $lieu_retour, $statut) {
        $this->id_reservation = $id_reservation;
        $this->client_id_reserv = $client_id_reserv;
        $this->vehicule_id_reserv = $vehicule_id_reserv;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->lieu_depart = $lieu_depart;
        $this->lieu_retour = $lieu_retour;
        $this->statut = $statut;
    }

    // Getters
    public function getIdReservation() {
        return $this->id_reservation;
    }

    public function getClientIdReserv() {    
        return $this->client_id_reserv;
    }

    public function getVehiculeIdReserv() {  
        return $this->vehicule_id_reserv;
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