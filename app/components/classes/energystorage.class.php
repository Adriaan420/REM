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

        public function setCapacityWind($windcapacity){
            $this->windcapacity = $windcapacity;
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

        public function pushWind($push){
            if ($this->windcapacity + $this->suncapacity <= $this->capacity){
                $this->windcapacity = $this->windcapacity + $push;
            }
            if ($this->windcapacity + $push > $this->capacity - $this->suncapacity){
                $this->windcapacity = $this->capacity - $this->suncapacity;
            }
        }

        public function pullWind($pull){
            $giveBack = 0;
            $test = $pull;
            $pull = abs($pull);
            if ($this->windcapacity > 0){
                if (($this->windcapacity - $pull) < 0){
                    $giveBack = $this->windcapacity;
                    $this->windcapacity = 0;
                }
                else{
                    $giveBack = $pull;
                    $this->windcapacity = $this->windcapacity - $giveBack;
                }
            }
            return $giveBack;
        }

    }

?>