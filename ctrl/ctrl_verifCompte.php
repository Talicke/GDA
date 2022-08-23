<?php 
include "./utils/connecteBDD.php";
include "./Model/model_compte.php";
include './manager/manager_compte.php';

if (!isset($_GET['mail']) && !isset($_GET['key'])){
    echo "aucun compte à vérifier";
}else{
    echo "je vérifie le compte ".$_GET['mail']."";
    $compte = new ManagerCompte ($_GET['mail'], null, null, null);
    $user = $compte -> voirCompteParEMail($bdd);
    if($user){
        echo "Un compte avec ce mail existe <br/>";
        echo $user->auth_compte;
        if($_GET['key'] == $user->auth_compte){
            echo "Le compte est bon";
            $compte->validerCompte($bdd);
        }else{
            echo "mauvaise clé";
        }
        
    }else{
        echo "aucun compte utilisateur avec cette id";
    }
}