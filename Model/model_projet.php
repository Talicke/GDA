<?php
    class Projet{
        private ?int $id_projet;
        private ?string $nom_projet;
        private ?int $id_compte;
        private ?int $id_activite;

        public function __construct(?string $nom, ?int $compte, ?int $activite)
        {
            $this->nom_projet = $nom;
            $this->id_compte = $compte;
            $this->id_activite = $activite;
        }
        
        // GETTER
        public function getIdProjet():?int{
            return $this->id_projet;
        }
        public function getNomProjet():?string{
            return $this->nom_projet;
        }
        public function getCompteProjet():?int{
            return $this->id_compte;
        }
        public function getActiviteProjet():?int{
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
    }