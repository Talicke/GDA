<?php
    class Activite{
        private ?int $id_activite;
        private ?string $nom_activite;
        private ?int $temps_activite;
        private ?int $id_compte;
        private ?int $id_frequence;

        public function __construct(?string $nom, ?int $temps, ?int $compte, ?int $frequence)
        {
            $this->nom_activite = $nom;
            $this->temps_activite = $temps;
            $this->id_compte = $compte;
            $this->id_frequence = $frequence;
        }

        
        // GETTER
        public function getIdActivite():?int{
            return $this->id_activite;
        }
        public function getNomActivite():?string{
            return $this->nom_activite;
        }
        public function getTempsActivite():?int{
            return $this->temps_activite;
        }
        public function getCompteActivite():?int{
            return $this->id_compte;
        }
        public function getFrequenceActivite():?int{
            return $this->id_frequence;
        }
        
        // SETTER
        public function setIdActivite($id):void{
            $this->id_activite = $id;
        }
        public function setNomActivite($nom):void{
            $this->nom_activite = $nom;
        }
        public function setTempsActivite($temps):void{
            $this->temps_activite = $temps;
        }
        public function setCompteActivite($compte):void{
            $this->id_compte = $compte;
        }
        public function setFrequenceActivite($frequence):void{
            $this->id_frequence = $frequence;
        }
    }