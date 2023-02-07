<?php
include('Connection.php');

if(!empty($_GET['id'])){
    $requete = $pdo->prepare("Delete from vols where id = :id");
    $requete->bindParam(':id',$_GET['id']);
    $requete->execute();
    $retour["success"] = true;
    $retour["messgae"] = "Le vol a été supprimé";
    $retour["results"] = array();
}else{
    $retour["success"]= false;
    $retour["messgae"]= "Le id est incorrect";
}

echo json_encode($retour);
