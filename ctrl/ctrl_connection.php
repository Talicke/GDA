<?php
include "./utils/connecteBDD.php";
include "./Model/model_compte.php";
include "./view/view_connection.html";

if(isset($_POST['login']) && isset($_POST['mdp'])){
    $user = new Compte($_POST['login'], $_POST['mdp'], null, null);
    $compte=$user->voirCompteParEmail($bdd);
    if(!empty($compte)){
        if($compte->password_compte == $_POST['mdp']){
            header('Location: ./newNote');
        }else{
            echo "information incorrect !";
        }
    }else{
        echo "aucun compte a cette e-mail";
    }
}else{
    echo "Tout les champs doivent être remplient";
}
