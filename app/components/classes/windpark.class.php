<?php

    class Windpark extends Energysource {

        var $windpower = 0;
        var $energising = 0;
        var $store = 0;

        function setWindpower($windpower) {
            return $this->windpower = $windpower;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        function getWindpower() {
            return $this->windpower;
        }

        public function getEnergising(){
            return $this->energising;
        }

        public function calculateEnergising(){

        }

        public function fillEnergyStorage(){
            return $this->store;
        }

    }

?>