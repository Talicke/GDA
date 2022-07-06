<?php 
include "./utils/connecteBDD.php";
include "./model/model_compte.php";

if (!isset($_GET['id']) && !isset($_GET['key'])){
    echo "aucun compte à vérifier";
}else{
    echo "je vérifie le compte";
    $compte = new Compte (null, null, null, null);
    $user = $compte -> voirCompteParId($bdd, $_GET['id']);
    if($user){
        echo "Un compte avec cet id existe";
        var_dump(getType($user[1]));
    }else{
        echo "aucun compte utilisateur avec cette id";
    }
}