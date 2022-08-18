<?php
    class Projet{
        private $id_projet;
        private $nom_projet;
        private $id_compte;
        private $id_activite;

        public function __construct($nom, $compte, $activite)
        {
            $this->nom_projet = $nom;
            $this->id_compte = $compte;
            $this->id_activite = $activite;
        }
        // GETTER
        public function getIdProjet():int{
            return $this->id_projet;
        }
        public function getNomProjet():string{
            return $this->nom_projet;
        }
        public function getCompteProjet():int{
            return $this->id_compte;
        }
        public function getActiviteProjet():int{
            return $this->id_activite;
        }
        
        // SETTER
        public function setIdProjet($id):void{
            $this->id_projet = $id;
        }
        public function setNomProjet($nom):void{
            $this->nom_projet = $nom;
        }
        public function setCompteProjet($compte):void{
            $this->id_compte = $compte;
        }
        public function setActiviteProjet($activite):void{
            $this->id_activite = $activite;
        }


        // Méthodes
        public function ajoutProjet($bdd):void{
            try{
                $req = $bdd->prepare('INSERT INTO projets(nom_projet, id_compte, id_activite)
                VALUES (:nom, :compte, :activite)');
                $req->execute(array(
                    ':nom'=> $this->getNomProjet(),
                    ':compte' => $this->getCompteProjet(),
                    ':activite' => $this->getActiviteProjet()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        } 
    }