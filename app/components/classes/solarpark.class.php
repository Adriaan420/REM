<?php
    class SolarPark extends EnergySource {

        var $solarpower = 0;
        var $store = 0;

        function setSolarpower($solarpower) {
            return $this->solarpower = $solarpower;
        }

        function getSolarpower() {
            return $this->solarpower;
        }

        public function calculateEnergising(Consumer $consumer){
            return $this->energising = $consumer->getTotalDemand() / 100 * $consumer->getSolarDemand();
        }

        public function fillEnergyStorage(){
            return $this->store;
        }

    }

?>