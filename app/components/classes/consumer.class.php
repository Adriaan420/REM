<?php

    class Consumer {

        var $totaldemand = 0;
        var $coaldemand = 0;
        var $naturalgasdemand = 0;
        var $nucleardemand = 0;
        var $winddemand = 0;
        var $solardemand = 0;

        public function getTotalDemand(){
            return $this->totaldemand;
        }

        public function getCoalDemand(){
            return $this->coaldemand;
        }

        public function getNaturalGasDemand(){
            return $this->naturalgasdemand;
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

        public function setNaturalGasDemand($naturalgasdemand){
            return $this->naturalgasdemand = $naturalgasdemand;
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