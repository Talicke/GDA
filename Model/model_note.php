<?php
    class Note{
        private $id_note;
        private $contenu_note;
        private $date_note;
        private $estTerminer;
        private $id_cat;
        private $id_activite;
        private $id_projet;
        private $id_compte;
        private $id_rdv;
        private $id_rappel;

        public function __construct($contenu, $date, $estTerminer, $cat, $activite, $projet, $compte, $rdv, $rappel){
            $this -> contenu_note = $contenu;
            $this -> date_note = $date;
            $this -> estTerminer = $estTerminer;
            $this -> id_cat = $cat;
            $this -> id_activite = $activite;
            $this -> id_projet = $projet;
            $this -> id_compte = $compte;
            $this -> id_rdv = $rdv;
            $this -> id_rappel = $rappel;
        }

        //GETTER
        public function getIdNote():int{
            return $this -> id_note;
        }
        public function getContenuNote():string{
            return $this -> contenu_note;
        }
        public function getDateNote():string{
            return $this -> date_note;
        }
        public function getEstTerminer():int{
            return $this -> estTerminer;
        }
        public function getIdCat(){
            return $this -> id_cat;
        }
        public function getIdActivite(){
            return $this -> id_activite;
        }
        public function getIdProjet(){
            return $this -> id_projet;
        }
        public function getIdCompte(){
            return $this -> id_compte;
        }
        public function getIdRdv(){
            return $this -> id_rdv;
        }
        public function getIdRappel(){
            return $this -> id_rappel;
        }

        //SETTER
        public function setIdNote($id):void{
            $this -> id_note = $id;
        }
        public function setContenuNote($contenu):void{
            $this -> contenu_note = $contenu;
        }
        public function setDateNote($date):void{
            $this -> date_note = $date;
        }
        public function setEstTerminer($bool):void{
            $this -> estTerminer = $bool;
        }
        public function setIdCat($id):void{
            $this -> id_cat = $id;
        }
        public function setIdActivite($id):void{
            $this -> id_activite = $id;
        }
        public function setIdProjet($id):void{
            $this -> id_projet = $id;
        }
        public function setIdCompte($id):void{
            $this -> id_compte = $id;
        }
        public function setIdRdv($id):void{
            $this -> id_rdv = $id;
        }
        public function setIdRappel($id):void{
            $this -> id_rappel = $id;
        }
        //methode
        public function ajoutNote($bdd):void{
            try{
                $req = $bdd->prepare('INSERT INTO notes(contenu_note, date_note, estTerminer, id_cat, id_activite, id_projet, id_compte, id_rdv, id_rappel)
                VALUES (:contenu, :date, :estTerminer, :cat, :activite, :projet, :compte, :rdv, :rappel)');
                $req->execute(array(
                    ':contenu'=> $this->getContenuNote(),
                    ':date'=>$this->getDateNote(),
                    ':estTerminer'=>$this->getEstTerminer(),
                    ':cat'=>$this->getIdCat(),
                    ':activite'=>$this->getIdActivite(),
                    ':projet'=>$this->getIdProjet(),
                    ':compte'=>$this->getIdCompte(),
                    ':rdv'=>$this->getIdRdv(),
                    ':rappel'=>$this->getIdRappel()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function changerCatNote($bdd, $cat_note){
            try{
                $req = $bdd->prepare('UPDATE notes SET id_cat = :cat_note WHERE id_note = :id_note');
                $req->execute(array(
                    'cat_note' => $cat_note,
                    'id_note' =>$this->getIdNote()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }
        
        public function modifierNote($bdd){
            try{
                $req = $bdd->prepare('UPDATE notes SET contenu_note = :contenu, id_activite = :activite, id_projet = :projet WHERE id_note = :id_note');
                $req->execute(array(
                    'contenu' => $this->getContenuNote(),
                    'activite' => $this->getIdActivite(),
                    'projet' => $this->getIdProjet(),
                    'id_note'=> $this->getIdNote()
                ));
            }
                catch(Exception $e){
                    die('Erreur' .$e->getMessage());
                }
        }

    }