<?php

    class SolarPark extends EnergySource {

        var $solarpower = 0;
        var $energising = 0;
        var $store = 0;

        function setSolarpower($solarpower) {
            return $this->solarpower = $solarpower;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        function getSolarpower() {
            return $this->solarpower;
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