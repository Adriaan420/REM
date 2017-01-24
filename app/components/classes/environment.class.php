<?php

    class Environment {

        var $solarstrenght = 0;
        var $temperature = 0;
        var $windspeed = 0;
        var $hours = 0;
        var $minutes = 0;

        public function setSolarStrenght($solarstrenght){
            return $this->solarstrenght = $solarstrenght;
        }

        public function setTemperature($temperature){
            return $this->temperature = $temperature;
        }

        public function setWindSpeed($windspeed){
            return $this->windspeed = $windspeed;
        }

        public function setTime($hours, $minutes){
            $this->setHours($hours);
            $this->setMinutes($minutes);
            return $this->getTime();
        }

        public function setHours($hours) {
            return $this->hours = $hours;
        }

        public function setMinutes($minutes) {
            return $this->minutes = $minutes;
        }

        public function getSolarStrenght(){
            return $this->solarstrenght;
        }

        public function getTemperature(){
            return $this->temperature;
        }

        public function getWindSpeed(){
            return $this->windspeed;
        }

        public function getHours(){
            return $this->hours;
        }

        public function getMinutes(){
            return $this->minutes;
        }

        public function getTime(){
            if ($this->minutes < 10){
                return $this->hours .":0". $this->minutes;
            }
            else{
                return $this->hours .":". $this->minutes;
            }
        }

    }

?>