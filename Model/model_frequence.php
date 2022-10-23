<?php
    class Frequence{
        private ?int $id_freq;
        private ?string $intituler_freq;

        // GETTER
        public function getIdFreq():?int{
            return $this->id_freq;
        }
        public function getintitulerFreq():?string{
            return $this->intituler_freq;
        }
        
        // SETTER
        public function setIdFreq($id):void{
            $this->id_freq = $id;
        }
        public function setIntitulerFreq($nom):void{
            $this->intituler_freq = $nom;
        }

    }