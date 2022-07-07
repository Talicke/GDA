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
        echo "Un compte avec cet id existe <br/>";
        echo $user->auth_compte;
        if($_GET['key'] == $user->auth_compte){
            echo "Le compte est bon";
            mail(
                "ropars.k@gmail.com",
                "Authentification GDA",
                'http://gda/verifCompte?id='.$user->id_compte.'&key='.$user->auth_compte.'',
            );
            
        }else{
            echo "mauvaise clé";
        }
        
    }else{
        echo "aucun compte utilisateur avec cette id";
    }
}