<?php
    class Activite{
        private $id_activite;
        private $nom_activite;
        private $temps_activite;
        private $id_compte;
        private $id_frequence;

        public function __construct($nom, $temps, $compte, $frequence)
        {
            $this->nom_activite = $nom;
            $this->temps_activite = $temps;
            $this->id_compte = $compte;
            $this->id_frequence = $frequence;
        }
        // GETTER
        public function getIdActivite():int{
            return $this->id_activite;
        }
        public function getNomActivite():string{
            return $this->nom_activite;
        }
        public function getTempsActivite():int{
            return $this->temps_activite;
        }
        public function getCompteActivite():int{
            return $this->id_compte;
        }
        public function getFrequenceActivite(){
            return $this->id_frequence
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
            $this->id_frequence = $frequence
        }
        // Méthodes