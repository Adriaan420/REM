<?php

    class NuclearPlant extends EnergySource {

        var $nuclear = 0;
        var $energytype = 'nuclearplant';

        public function setNuclear($nuclear) {
            return $this->nuclear = $nuclear;
        }

        public function getNuclear() {
            return $this->nuclear;
        }

        public function calculateEnergising(Consumer $consumer){
            return $this->energising = $consumer->getTotalDemand() / 100 * $consumer->getNuclearDemand();
        }

        public function calculatePricekWh(){
            return $this->pricekWh = 0.06274;
        }

    }

?>