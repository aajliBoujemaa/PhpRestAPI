<?php
include('Connection.php');

if( !empty($_POST['ville_depart']) && !empty($_POST['ville_destination']) && !empty($_POST['date_depart']) && !empty($_POST['nbr_heure_vol']) && !empty($_POST['prix'])){
    if(intval($_POST["prix"])>0){
        $requete = $pdo->prepare("INSERT INTO `vols`(`id`,`ville_depart`, `ville_destination`, `date_depart`, `nbr_heure_vol`, `prix`) VALUES (NULL,:ville_depart,:ville_destination,:date_depart,:nbr_heure_vol,:prix)");
        $requete->bindParam(':ville_depart', $_POST['ville_depart']);
        $requete->bindParam(':ville_destination', $_POST['ville_destination']);
        $requete->bindParam(':date_depart', $_POST['date_depart']);
        $requete->bindParam(':nbr_heure_vol', $_POST['nbr_heure_vol']);
        $requete->bindParam(':prix', $_POST['prix']);
        $requete->execute();
        $retour["success"] = true;
        $retour["messgae"] = "Le vol a été ajouté";
        $retour["results"] = array();
        
    }else{
        $retour["success"]= false;
        $retour["messgae"]= "Le prix n'est pas correct";
    }
    
}else{
    $retour["success"]= false;
    $retour["messgae"]= "Il manque des inforamations !";
}



echo json_encode($retour);



?>