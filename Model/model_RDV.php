<?php
    class RDV{
        private ?int $id_RDV;
        private ?string $date_RDV;
        private ?string $heure_RDV;
        private ?string $lieu_RDV;
        private ?int $id_note;

        public function __construct(?string $date, ?string $duree, ?int $note){
            $this->date_RDV = $date;
            $this->duree_RDV = $duree;
            $this->id_note = $note;
        }

        //GETTER
        public function getIdRDV():?int{
            return $this->id_RDV;
        }
        public function getDateRDV():?string{
            return $this->date_RDV;
        }
        public function getHeureRDV():?string{
            return $this->heure_RDV;
        }
        public function getLieuRDV():?string{
            return $this->lieu_RDV;
        }
        public function getIdNote():?int{
            return $this->id_note;
        }

        //SETTER
        public function setIdTache($id):void{
            $this->id_RDV = $id;
        }
        public function setDateRDV($date):void{
            $this->date_RDV = $date;
        }
        public function setHeureRDV($heure):void{
            $this->heure_RDV = $heure;
        }
        public function setLieuRDV($lieu):void{
            $this->lieu_RDV = $lieu;
        }
        public function setIdNote($note):void{
            $this->id_note = $note;
        }

    }