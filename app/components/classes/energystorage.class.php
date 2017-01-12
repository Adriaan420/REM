<?php

    class EnergyStorage {

        var $capacity = 0;
        var $filledcapacity = 0;
        var $solarcapacity = 0;
        var $windcapacity = 0;

        public function setCapacity($capacity){
            return $this->capacity = $capacity;
        }

        public function setFilledCapacity($filledcapacity){
            return $this->filledcapacity = $filledcapacity;
        }

        public function setCapacitySolar($solarcapacity){
            $this->solarcapacity = $solarcapacity;
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

        public function getCapacitySolar(){
            return $this->solarcapacity;
        }

        public function getCapacityWind(){
            return $this->windcapacity;
        }

        public function getPercentageFilled(){
            return $this->getFilledcapacity() / $this->getCapacity() * 100;
        }

        public function pushWind($push){
            if ($this->windcapacity + $push > $this->capacity - $this->solarcapacity){
                $push = $this->capacity - $this->solarcapacity;
                $this->windcapacity = $this->capacity - $this->solarcapacity;
            }
            elseif ($this->windcapacity + $this->solarcapacity <= $this->capacity){
                $this->windcapacity = $this->windcapacity + $push;
            }
            return $push;
        }

        public function pullWind($pull){
            $giveBack = 0;
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

        public function pushSolar($push){
            if ($this->solarcapacity + $push > $this->capacity - $this->windcapacity){
                $push = $this->capacity - $this->windcapacity;
                $this->solarcapacity = $this->capacity - $this->windcapacity;
            }
            elseif ($this->solarcapacity + $this->windcapacity <= $this->capacity){
                $this->solarcapacity = $this->solarcapacity + $push;
            }
            return $push;
        }

        public function pullSolar($pull){
            $giveBack = 0;
            $pull = abs($pull);
            if ($this->solarcapacity > 0){
                if (($this->solarcapacity - $pull) < 0){
                    $giveBack = $this->solarcapacity;
                    $this->solarcapacity = 0;
                }
                else{
                    $giveBack = $pull;
                    $this->solarcapacity = $this->solarcapacity - $giveBack;
                }
            }
            return $giveBack;
        }

    }

?>