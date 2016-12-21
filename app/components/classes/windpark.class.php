<?php
    class WindPark extends EnergySource {

        var $windpower = 0;
        var $store = 0;

        public function setWindPower($windpower) {
            return $this->windpower = $windpower;
        }

        function getWindPower() {
            return $this->windpower;
        }

        public function calculateEnergising(Consumer $consumer){
            return $this->energising = $consumer->getTotalDemand() / 100 * $consumer->getWindDemand();
        }

        public function fillEnergyStorage(){
            return $this->store;
        }

    }

?>