<?php
namespace App\Blog;

class Article {
    private $id;
    private $id_client;
    private $id_theme;
    private $titre;
    private $contenu;

    public function __construct($id, $id_client, $id_theme, $titre, $contenu) {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_theme = $id_theme;
        $this->titre = $titre;
        $this->contenu = $contenu;
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
}