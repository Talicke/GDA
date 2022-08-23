<?php
include "./utils/connecteBDD.php";
include "./Model/model_compte.php";
include "./manager/manager_compte.php";

    /*------------------------------------------------
                        VARIABLES
    ------------------------------------------------*/
    $message = "";


if(isset($_POST['connexion'])){
    if(!empty($_POST['login']) && !empty($_POST['mdp'])){
        $user = new ManagerCompte($_POST['login'], $_POST['mdp'], null, null);
        $compte=$user->voirCompteParEmail($bdd);
        if(!empty($compte)){
            if($compte->password_compte == $_POST['mdp']){
                $_SESSION['id'] = $compte->id_compte;
                $_SESSION['mail'] = $compte->login_compte;
                $_SESSION['estValide'] = $compte->estValide;
                $_SESSION['estConnecter'] = true;
                header('Location: ./newNote');
            }else{
                $message = " information incorrect !";
            }
        }else{
            $message = "aucun compte a cette e-mail ";
        }
    }else{
        $message = "<div class='error'>Tout les champs doivent être remplient</div>";
    }
}

echo $twig->render('connexion.html.twig',[
    'titre' => 'Connexion',
    'message' => $message
])

?>
