<?php

    class NuclearPlant extends EnergySource {

        var $nuclear = 0;
        var $energising = 0;

        public function setNuclear($nuclear) {
            return $this->nuclear = $nuclear;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        public function getNuclear() {
            return $this->nuclear;
        }

        public function getEnergising(){
            return $this->energising;
        }

        public function calculateEnergising(){

        }

    }

?>