<?php

    class Energysource{

        var $co2emissions = 0;
        var $pricekWh = 0;
        var $energising = 0;

        public function setCO2emissions($co2emissions){
            return $this->co2emissions = $co2emissions;
        }

        public function setPricekWh($pricekWh){
            return $this->pricekWh = $pricekWh;
        }

        public function getCO2uitstoot(){
            return $this->co2emissions;
        }

        public function getPricekWh(){
            return $this->pricekWh;
        }

    }

?>