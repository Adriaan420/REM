<?php
    class SolarPark extends EnergySource {

        var $solarpower = 0;
        var $store = 0;
        var $squaremeters = 0;
        var $generateOneSquareMeter = 0;
        var $powerGenerated = 0;

        public function setSolarpower($solarpower) {
            return $this->solarpower = $solarpower;
        }

        public function setSquareMeters($squaremeters){
            return $this->squaremeters = $squaremeters;
        }

        public function setPowerGenerated() {
            return $this->powerGenerated = $this->generateOneSquareMeter * $this->squaremeters;
        }

        public function getSolarpower() {
            return $this->solarpower;
        }

        public function getSquareMeters(){
            return$this->squaremeters;
        }

        public function getPowerGenerated() {
            return $this->powerGenerated;
        }

        public function powerGeneratedOneSquareMeter(Environment $environment){
            //Source power generated one square meter: https://www.bespaarbazaar.nl/kenniscentrum/financieel/zonnepanelen-opbrengst/
            //125 / 365 / 24
            $onesquare = 0.014;
            return $this->generateOneSquareMeter = $onesquare * ($environment->getSolarstrenght() / 100);
        }

        public function calculateEnergising(Consumer $consumer, EnergyStorage $energyStorage, Environment $environment){
            $this->powerGeneratedOneSquareMeter($environment);
            $this->setPowerGenerated();
            $difference = $this->getPowerGenerated() - (($consumer->getTotalDemand() / 100) * $consumer->getSolarDemand());
            if ($difference < 0){
                $transfer = -$energyStorage->pullSolar($difference);
            }
            if ($difference > 0){
                $transfer = $energyStorage->pushSolar($difference);
            }
            return $transfer;}

    }

?>