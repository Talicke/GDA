<?php
    class Rappel{
        private ?int $id_rappel;
        private ?string $date_rappel;
        private ?string $heure_rappel;
        private ?int $id_note;

        public function __construct(?string $date, ?string $duree, ?int $note){
            $this->date_rappel = $date;
            $this->duree_rappel = $duree;
            $this->id_note = $note;
        }

        //GETTER
        public function getIdRappel():?int{
            return $this->id_rappel;
        }
        public function getDateRappel():?string{
            return $this->date_rappel;
        }
        public function getHeureRappel():?string{
            return $this->heure_rappel;
        }
        public function getIdNote():?int{
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

    }