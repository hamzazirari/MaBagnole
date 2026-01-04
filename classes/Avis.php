<?php
class Avis {
    private $id;
    private $client_id;
    private $vehicule_id;
    private $note;
    private $commentaire;
    private $soft_deleted;
    private $date_avis;

    public function __construct($id, $client_id, $vehicule_id, $note, $commentaire, $soft_deleted, $date_avis) {
        $this->id = $id;
        $this->client_id = $client_id;
        $this->vehicule_id = $vehicule_id;
        $this->note = $note;
        $this->commentaire = $commentaire;
        $this->soft_deleted = $soft_deleted;
        $this->date_avis = $date_avis;
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

    public function getNote() {
        return $this->note;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function isSoftDeleted() {
        return $this->soft_deleted;
    }

    public function getDateAvis() {
        return $this->date_avis;
    }

    // Setters
    public function setNote($note) {
        $this->note = $note;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function setSoftDeleted($soft_deleted) {
        $this->soft_deleted = $soft_deleted;
    }
}
?>