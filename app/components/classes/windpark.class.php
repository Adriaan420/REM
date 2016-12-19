<?php

    class WindPark extends EnergySource {

        var $windpower = 0;
        var $energising = 0;
        var $store = 0;

        public function setWindPower($windpower) {
            return $this->windpower = $windpower;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        function getWindPower() {
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