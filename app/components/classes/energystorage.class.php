<?php

    class EnergyStorage {

        var $capacity = 0;
        var $filledcapacity = 0;
        var $suncapacity = 0;
        var $windcapacity = 0;

        public function setCapacity($capacity){
            return $this->capacity = $capacity;
        }

        public function setFilledCapacity($filledcapacity){
            return $this->filledcapacity = $filledcapacity;
        }

        public function setCapacitySun(SunPark $sunpark){
            return $this->suncapacity = $this->suncapacity + $sunpark->fillEnergyStorage();
        }

        public function setCapacityWind(WindPark $windpark){
            return $this->windcapacity = $this->windcapacity + $windpark->fillEnergyStorage();
        }

        public function getCapacity(){
            return $this->capacity;
        }

        public function getFilledCapacity(){
            return $this->filledcapacity;
        }

        public function getCapacitySun(){
            return $this->suncapacity;
        }

        public function getCapacityWind(){
            return $this->windcapacity;
        }

        public function getPercentageFilled(){
            return $this->getFilledcapacity() / $this->getCapacity() * 100;
        }

        public function transferSun($transfer){
            if ($transfer > $this->getCapacitySun()){
                $transfer = $this->getCapacitySun();
            }
            return $transfer;
        }

        public function transferWind($transfer){
            if ($transfer > $this->getCapacityWind()){
                $transfer = $this->getCapacityWind();
            }
            return $transfer;
        }

    }

?>