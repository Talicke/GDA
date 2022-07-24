<?php
    class Tache{
        private $id_tache;
        private $date_tache;
        private $duree_tache;
        private $id_note;

        public function __construct($date, $duree, $note){
            $this->date_tache = $date;
            $this->duree_tache = $duree;
            $this->id_note = $note;
        }

        //GETTER
        public function getIdTache():int{
            return $this->id_tache;
        }
        public function getDateTache(){
            return $this->date_tache;
        }
        public function getDureeTache():int{
            return $this->duree_tache;
        }
        public function getIdNote():int{
            return $this->id_note;
        }

        //SETTER
        public function setIdTache($id):void{
            $this->id_tache = $id;
        }
        public function setDateTache($date):void{
            $this->date_tache = $date;
        }
        public function setDureeTache($duree):void{
            $this->duree_tache = $duree;
        }
        public function setIdNote($note):void{
            $this->id_note = $note;
        }

        //methode
        public function ajoutTache($bdd):void{
            try{
                $req = $bdd->prepare('INSERT INTO taches (date_tache, duree_tache, id_note) VALUES (:date, :duree, :note)');
                $req->execute(array(
                    ':date' => $this->getDateTache(),
                    ':duree' => $this->getDureeTache(),
                    ':note' => $this->getIdNote()
                ));
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

        public function voirTacheParNote($bdd):obj{
            try{
                $req=$bdd->prepare('SELECT * FROM taches WHERE id_note = :note)');
                $req->execute(array(
                    ':note' => $this->getIdNote()
                ));
                $data = $req -> fetch(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur '.$e->getMessage());
            }
        }

    }

?>