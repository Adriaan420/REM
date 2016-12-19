<?php

    class EnergySource{

        var $pricekWh = 0;
        var $energising = 0;

        public function setPricekWh($pricekWh){
            return $this->pricekWh = $pricekWh;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        public function getPricekWh(){
            return $this->pricekWh;
        }

        public function getEnergising(){
            return $this->energising;
        }

    }

?>