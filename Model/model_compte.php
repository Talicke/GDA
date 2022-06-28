<?php
    class Compte{
        private $id_compte;
        private $mail_compte;
        private $mdp_compte;
        private $cle_compte;
        private $isAuth;
        public function __construct($id, $mail, $mdp, $cle, $auth)
        {
            $this -> id_compte = $id;
            $this -> mail_compte = $mail;
            $this -> mdp_compte = $mdp;
            $this -> cle_compte = $cle;
            $this -> isAuth = $auth
        }
        // GETTER
        public function getIdCompte():int{
            return $this -> id_compte;
        }
        public function getMailCompte():string{
            return $this -> mail_compte;
        }
        public function getMdpCompte():string{
            return $this -> mdp_compte;
        }
        public function getCleCompte():float{
            return $this -> cle_compte;
        }
        public function getAuthCompte():string{
            return $this -> isAuth;
        }
        // SETTER
        public function setIdCompte($id):void{
            $this -> id_compte = $id;
        }
        public function setMailCompte($mail):void{
            $this -> mail_compte = $mail;
        }
        public function setMdpCompte($mdp):void{
            $this -> mdp_compte = $mdp;
        }
        public function setCleCompte($cle):void{
            $this -> cle_compte = $cle;
        }
        public function setAuthCompte($auth):void{
            $this -> isAuth = $auth;
        }
        // Méthodes
        public function ajoutCompte($bdd, $user):array{
            try{
                $req = $bdd->prepare('INSERT INTO compte(login_compte, password_compte, auth_compte, estValide) VALUES (:mail, :mdp, :auth, :isAuth)');
                $req->execute(array(
                    ':mail' => $this -> getMailCompte(),
                    ':mdp' => $this -> getMdpCompte(),
                    ':auth' => $this -> getCleCompte(),
                    ':isAuth' => $this -> getAuthCompte()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
        }
    }
}
?>