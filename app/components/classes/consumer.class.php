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

        public function setTotalDemand($totaldemand){
            return $this->totaldemand = $totaldemand;
        }

        public function setCoalDemand($coaldemand){
            return $this->coaldemand = $coaldemand;
        }

        public function setGasDemand($gasdemand){
            return $this->gasdemand = $gasdemand;
        }

        public function setNuclearDemand($nucleardemand){
            return $this->nucleardemand = $nucleardemand;
        }

        public function setWindDemand($winddemand){
            return $this->winddemand = $winddemand;
        }

        public function setSolarDemand($solardemand){
            return $this->solardemand = $solardemand;
        }
    }

?>