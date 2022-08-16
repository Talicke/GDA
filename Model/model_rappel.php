<?php
    class Rappel{
        private $id_rappel;
        private $date_rappel;
        private $heure_rappel;
        private $id_note;

        public function __construct($date, $duree, $note){
            $this->date_rappel = $date;
            $this->duree_rappel = $duree;
            $this->id_note = $note;
        }

        //GETTER
        public function getIdRappel():int{
            return $this->id_rappel;
        }
        public function getDateRappel(){
            return $this->date_rappel;
        }
        public function getHeureRappel(){
            return $this->heure_rappel;
        }
        public function getIdNote(){
            return $this->id_note;
        }

        //SETTER
        public function setIdTache($id):void{
            $this->id_rappel = $id;
        }
        public function setDateRappel($date):void{
            $this->date_rappel = $date;
        }
        public function setHeureRappel($heure):void{
            $this->heure_rappel = $heure;
        }
        public function setIdNote($note):void{
            $this->id_note = $note;
        }

        //methode
        public function ajoutRappel($bdd):void{
            try{
                $req = $bdd->prepare('INSERT INTO rappels (date_rappel, duree_rappel, id_note) VALUES (:date, :heure, :note)');
                $req->execute(array(
                    ':date' => $this->getDateRappel(),
                    ':heure' => $this->getHeureRappel(),
                    ':note' => $this->getIdNote()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

    }