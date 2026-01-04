<?php
class Client {
    private $id;
    private $nom;
    private $email;
    private $motpasse_hash;

    public function __construct($id, $nom, $email, $motpasse_hash) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->motpasse_hash = $motpasse_hash;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotpasseHash() {
        return $this->motpasse_hash;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMotpasseHash($motpasse_hash) {
        $this->motpasse_hash = $motpasse_hash;
    }
}
?>