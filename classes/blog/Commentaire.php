<?php
namespace App\Blog;

class Commentaire {
    private $id;
    private $id_client;
    private $id_article;
    private $contenu;

    public function __construct($id, $id_client, $id_article, $contenu) {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_article = $id_article;
        $this->contenu = $contenu;
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
}