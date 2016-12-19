<?php

    class Consumer {

        var $totaldemand = 0;
        var $coaldemand = 0;
        var $gasdemand = 0;
        var $nucleardemand = 0;
        var $winddemand = 0;
        var $solardemand = 0;

        public function getTotalDemand(){
            return $this->totaldemand;
        }

        public function getCoalDemand(){
            return $this->coaldemand;
        }

        public function getGasDemand(){
            return $this->gasdemand;
        }

        public function getNuclearDemand(){
            return $this->nucleardemand;
        }

        public function getWindDemand(){
            return $this->winddemand;
        }

        public function getSolarDemand(){
            return $this->solardemand;
        }
    }

?>