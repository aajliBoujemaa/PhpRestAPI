<?php
header("Content-Type: application/json; charset=UTF-8");

try{
    $pdo = new PDO("mysql:host=localhost;dbname=api;","root","");
    $retour["success"]= true;
    $retour["messgae"]= "yes";

}catch(Exception $e){
    $retour["success"]= false;
    $retour["messgae"]= "Noooo";
}