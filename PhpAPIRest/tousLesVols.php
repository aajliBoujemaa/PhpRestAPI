<?php
include('Connection.php');

if(!empty($_POST['ville_depart'])){
    $requete = $pdo->prepare("Select * from vols where ville_depart = :villeD");
    $requete->bindParam('villeD',$_POST['ville_depart']);
    $requete->execute();
}else{
    $requete = $pdo->prepare("Select * from vols");
    $requete->execute();
}

$resultats = $requete->fetchAll();
$retour["success"]= true;
$retour["messgae"]= "yes";
$retour["results"]["nbr_vols"]= count($resultats);
$retour["results"]["vols"]= $resultats;

echo json_encode($retour);



?>