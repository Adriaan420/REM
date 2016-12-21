<?php

    class NaturalGas extends EnergySource {

        var $green = 0;
        var $gray = 0;

        public function getGreen(){
            return $this->green;
        }

        public function getGray(){
            return $this->gray;
        }

        public function setGreen($green){
            return $this->green = $green;
        }

        public function setGray($gray){
            return $this->gray = $gray;
        }

        public function calculateEnergising(Consumer $consumer){
            return $this->energising = $consumer->getTotalDemand() / 100 * $consumer->getGasDemand();
        }

        public function calculateGreen(){
            return $this->energising / 100 * $this->green;
        }

        public function calculateGray(){
            return $this->energising / 100 * $this->gray;
        }

        public function calculateCO2green(){
            $kwgreen = $this->calculateGreen();
            //calculate co2 green with formula
        }

        public function calculateCO2gray(){
            $kwgray = $this->calculateGray();
            //calculate co2 gray with formula
        }
    }

?>