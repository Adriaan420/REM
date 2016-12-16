<?php

    class Energystorage {

        var $capacity = 0;
        var $filledcapacity = 0;
        var $suncapacity = 0;
        var $windcapacity = 0;

        function setCapacity($capacity){
            return $this->capacity = $capacity;
        }

        function setFilledCapacity($filledcapacity){
            return $this->filledcapacity = $filledcapacity;
        }

        function setCapacitySun(Sunpark $sunpark){
            return $this->suncapacity = $this->suncapacity + $sunpark->fillEnergyStorage();
        }

        function setCapacityWind(Windpark $windpark){
            return $this->windcapacity = $this->windcapacity + $windpark->fillEnergyStorage();
        }

        function getCapacity(){
            return $this->capacity;
        }

        function getFilledCapacity(){
            return $this->filledcapacity;
        }

        function getCapacitySun(){
            return $this->suncapacity;
        }

        function getCapacityWind(){
            return $this->windcapacity;
        }

        function getPercentageFilled(){
            return $this->getFilledcapacity() / $this->getCapacity() * 100;
        }

        function transferSun($transfer){
            if ($transfer > $this->getCapacitySun()){
                $transfer = $this->getCapacitySun();
            }
            return $transfer;
        }

        function transferWind($transfer){
            if ($transfer > $this->getCapacityWind()){
                $transfer = $this->getCapacityWind();
            }
            return $transfer;
        }

    }

?>