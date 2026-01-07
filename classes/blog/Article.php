<?php
namespace App\Blog;

class Article {
    private $id;
    private $client_id_ar;
    private $id_theme;
    private $titre;
    private $contenu;
    private $tag;
    private $date_publication;
    private $statut;

    public function __construct($id, $client_id_ar, $id_theme, $titre, $contenu, $tag, $date_publication, $statut) {
        $this->id = $id;
        $this->client_id_ar = $client_id_ar;
        $this->id_theme = $id_theme;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->tag = $tag;
        $this->date_publication = $date_publication;
        $this->statut = $statut;
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

            public function getContenu() {
         return $this->contenu; }
    public function setContenu($contenu) { 
        $this->contenu = $contenu; }

            public function getContenu() {
         return $this->contenu; }
    public function setContenu($contenu) { 
        $this->contenu = $contenu; }

            public function getContenu() {
         return $this->contenu; }
    public function setContenu($contenu) { 
        $this->contenu = $contenu; }
}