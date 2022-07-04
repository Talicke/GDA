<?php
    class Compte{
        private $id_compte;
        private $mail_compte;
        private $mdp_compte;
        private $cle_compte;
        private $isAuth;
        public function __construct($mail, $mdp, $cle, $auth)
        {
            $this -> mail_compte = $mail;
            $this -> mdp_compte = $mdp;
            $this -> cle_compte = $cle;
            $this -> isAuth = $auth;
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
        public function getCleCompte(){
            return $this -> cle_compte;
        }
        public function getAuthCompte(){
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
        public function ajoutCompte($bdd):void{
            try{
                $req = $bdd->prepare('INSERT INTO comptes(login_compte, password_compte, auth_compte, estValide) VALUES (:mail, :mdp, :auth, :isAuth)');
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

        public function voirCompteParEmail($bdd){
            try{
                $req = $bdd->prepare('SELECT * FROM comptes WHERE login_compte = :mail');
                $req->execute(array(
                    ':mail' => $this -> getMailCompte(),
                ));
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
    }

?>