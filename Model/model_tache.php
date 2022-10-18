<?php
    class Tache{
        private ?int $id_tache;
        private ?string $date_tache;
        private ?string $duree_tache;
        private ?int $id_note;

        public function __construct(?string $date, ?string $duree, ?int $note){
            $this -> date_tache = $date;
            $this -> duree_tache = $duree;
            $this -> id_note = $note;
        }

        //GETTER
        public function getIdTache():?int{
            return $this->id_tache;
        }
        public function getDateTache():?string{
            return $this->date_tache;
        }
        public function getDureeTache():?int{
            return $this->duree_tache;
        }
        public function getIdNote():?int{
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
    }

?>