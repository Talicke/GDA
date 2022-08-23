<?php
include "./utils/connecteBDD.php";
include "./Model/model_compte.php";
include "./manager/manager_compte.php";

    /*------------------------------------------------
                        VARIABLES
    ------------------------------------------------*/
    $message = "";

if(isset($_POST['connexion'])){
    //Vérification que les champs sont remplient
    if(!empty($_POST['login']) && !empty($_POST['mdp'])){
        //nettoyage des entrees
        $login = netEntrer($_POST['login']);
        $mdp = netEntrer($_POST['mdp']);

        $user = new ManagerCompte($login, $mdp, null, null);

        //Obtention du compte qui correspond au login
        $compte=$user->voirCompteParEmail($bdd);

        //Vérification qu'un compte existe
        if(!empty($compte)){

            //Vérification que le mot de passe correspond
            if(password_verify($mdp, $compte->password_compte)){
                $_SESSION['id'] = $compte->id_compte;
                $_SESSION['mail'] = $compte->login_compte;
                $_SESSION['estValide'] = $compte->estValide;
                $_SESSION['estConnecter'] = true;
                header('Location: ./newNote');
            }else{
                $message = "<div class='error'>information incorrect!</div>";
            }
        }else{
            $message = "<div class='error'>information incorrect!</div>";
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
