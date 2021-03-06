<?php

    class NaturalGas extends EnergySource {

        var $green = 0;
        var $gray = 0;
        var $outputCO2NaturalGas = 0.465;
        var $pricekWhCO2emission = 0;
        var $energytype = 'naturalgas';

        public function getGreen(){
            return $this->green;
        }

        public function getGray(){
            return $this->gray;
        }

        public function getPricekWhCO2emission(){
            return $this->pricekWhCO2emission;
        }

        public function setGreen($green){
            return $this->green = $green;
        }

        public function setGray($gray){
            return $this->gray = $gray;
        }

        public function setPricekWhCO2emission($price){
            return $this->pricekWhCO2emission = $price;
        }

        public function calculateEnergising(Consumer $consumer){
            return $this->energising = $consumer->getTotalDemand() / 100 * $consumer->getNaturalGasDemand();
        }

        public function calculateGreen(){
            return $this->energising / 100 * $this->green;
        }

        public function calculateGray(){
            return $this->energising / 100 * $this->gray;
        }

        public function calculateCO2green(){
            //Output CO2 Coal: 465 grams(0,465 KG) / kWh. Source: http://blueskymodel.org/kilowatt-hour
            return $this->outputCO2NaturalGas * $this->calculateGreen();
        }

        public function calculateCO2gray(){
            return $this->outputCO2NaturalGas * $this->calculateGray();
        }

        public function calculatePricekWh(){
            return $this->pricekWh = 0.06274;
        }

    }

?>