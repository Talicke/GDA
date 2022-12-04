<?php
    class Note{
        private ?int $id_note;
        private ?string $contenu_note;
        private ?string $date_note;
        private ?int $estTerminer;
        private ?int $id_cat;
        private ?int $id_activite;
        private ?int $id_projet;
        private ?int $id_compte;

public function __construct(?string $contenu, ?string $date, ?int $estTerminer,
                            ?int $cat, ?int $activite, ?int $projet, ?int $compte){

            $this -> contenu_note = $contenu;
            $this -> date_note = $date;
            $this -> estTerminer = $estTerminer;
            $this -> id_cat = $cat;
            $this -> id_activite = $activite;
            $this -> id_projet = $projet;
            $this -> id_compte = $compte;
        }

        //GETTER

        public function getIdNote():?int{
            return $this -> id_note;
        }
        public function getContenuNote():?string{
            return $this -> contenu_note;
        }
        public function getDateNote():?string{
            return $this -> date_note;
        }
        public function getEstTerminer():?int{
            return $this -> estTerminer;
        }
        public function getIdCat():?int{
            return $this -> id_cat;
        }
        public function getIdActivite():?int{
            return $this -> id_activite;
        }
        public function getIdProjet():?int{
            return $this -> id_projet;
        }
        public function getIdCompte():?int{
            return $this -> id_compte;
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
    }