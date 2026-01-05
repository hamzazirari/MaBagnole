<?php
session_start();

if(!isset($_SESSION['id_client'])){
    header('Location: connexion.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $vehicule_id = $_POST['vehicule_id'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $lieu_depart = $_POST['lieu_depart'];
    $lieu_retour = $_POST['lieu_retour'];
    $client_id = $_SESSION['id_client'];
    
    require_once 'classes/Database.php';
    require_once 'classes/Reservation.php';
    
    $db = new Database();
    $pdo = $db->getPdo();
    
    // Vérifier disponibilité
    $stmt = $pdo->prepare("SELECT * FROM reservations 
                          WHERE vehicule_id_reserv = ? 
                          AND ((date_debut <= ? AND date_fin >= ?) 
                          OR (date_debut <= ? AND date_fin >= ?))");
    
    $stmt->execute([$vehicule_id, $date_debut, $date_debut, $date_fin, $date_fin]);
    $existe = $stmt->fetch();
    
    if($existe){
        echo "Désolé, ce véhicule est déjà réservé sur cette période.";
        echo '<br><a href="details_vehicule.php?id='.$vehicule_id.'">Retour</a>';
    } else {
        
        // Créer l'objet Reservation
        $reservation = new Reservation(
            null,
            $client_id,
            $vehicule_id,
            $date_debut,
            $date_fin,
            $lieu_depart,
            $lieu_retour,
            'confirmee'
        );
        
        $stmt = $pdo->prepare("INSERT INTO reservations 
                              (client_id_reserv, vehicule_id_reserv, date_debut, date_fin, lieu_depart, lieu_retour, statut) 
                              VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $reservation->getClientIdReserv(),      
            $reservation->getVehiculeIdReserv(),    
            $reservation->getDateDebut(),
            $reservation->getDateFin(),
            $reservation->getLieuDepart(),
            $reservation->getLieuRetour(),
            $reservation->getStatut()
        ]);
        
        header('Location: mes_reservations.php');
        exit();
    }
}
?>