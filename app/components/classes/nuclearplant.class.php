<?php

    class Nuclearplant extends Energysource {

        var $nuclear = 0;
        var $energising = 0;

        function setNuclear($nuclear) {
            return $this->nuclear = $nuclear;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        function getNuclear() {
            return $this->nuclear;
        }

        public function getEnergising(){
            return $this->energising;
        }

        public function calculateEnergising(){

        }

    }

?>