<?php

    class Randomizer{

        var $solarstrenght = null;
        var $temperature = null;
        var $windspeed = null;
        var $totaldemand = null;
        var $coaldemand = null;
        var $naturalgasdemand = null;
        var $nucleardemand = null;
        var $winddemand = null;
        var $solardemand = null;

        public function getSolarStrenght(){
            return $this->solarstrenght;
        }

        public function getTemperature(){
            return $this->temperature;
        }

        public function getWindspeed(){
            return $this->windspeed;
        }

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

        public function setSolarStrenght($solarstrenght){
            return $this->solarstrenght = $solarstrenght;
        }

        public function setTemperature($temperature){
            return $this->temperature = $temperature;
        }

        public function setWindspeed($windspeed){
            return $this->windspeed = $windspeed;
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

        public function randomizeSolarStrenght(Environment $environment){

            $min = 0;
            $max = 0;

            switch ($environment->getHours()) {
                //
                case 0:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 1:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 2:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 3:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 4:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 5:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 6:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(5);
                    break;
                case 7:
                    $min = $this->setSolarStrenght(5);

                    $max = $this->setSolarStrenght(15);
                    break;
                case 8:
                    $min = $this->setSolarStrenght(10);

                    $max = $this->setSolarStrenght(30);
                    break;
                case 9:
                    $min = $this->setSolarStrenght(15);

                    $max = $this->setSolarStrenght(35);
                    break;
                case 10:
                    $min = $this->setSolarStrenght(30);

                    $max = $this->setSolarStrenght(65);
                    break;
                case 11:
                    $min = $this->setSolarStrenght(50);

                    $max = $this->setSolarStrenght(90);
                    break;
                case 12:
                    $min = $this->setSolarStrenght(60);

                    $max = $this->setSolarStrenght(100);
                    break;
                case 13:
                    $min = $this->setSolarStrenght(50);

                    $max = $this->setSolarStrenght(90);
                    break;
                case 14:
                    $min = $this->setSolarStrenght(45);

                    $max = $this->setSolarStrenght(85);
                    break;
                case 15:
                    $min = $this->setSolarStrenght(40);

                    $max = $this->setSolarStrenght(80);
                    break;
                case 16:
                    $min = $this->setSolarStrenght(30);

                    $max = $this->setSolarStrenght(70);
                    break;
                case 17:
                    $min = $this->setSolarStrenght(20);

                    $max = $this->setSolarStrenght(40);
                    break;
                case 18:
                    $min = $this->setSolarStrenght(5);

                    $max = $this->setSolarStrenght(15);
                    break;
                case 19:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(5);
                    break;
                case 20:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(3);
                    break;
                case 21:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 22:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
                case 23:
                    $min = $this->setSolarStrenght(0);

                    $max = $this->setSolarStrenght(0);
                    break;
            }

            if($max >= 100){
                $max = 100;
            }

            if($min <= 0){
                $min = 0;
            }

            $solarstrenght = rand($min , $max);

            $this->setSolarStrenght($solarstrenght);

            return $this->solarstrenght;
        }

        public function randomizeTemperature(Environment $environment){

            if ($environment->getHours() >=3 && $environment->getHours() < 15){
                $min = $this->getTemperature() + 1;

                $max = $this->getTemperature() + 2;
            }
            if ($environment->getHours() >=15 || $environment->getHours() < 3){
                $min = $this->getTemperature() - 2;

                $max = $this->getTemperature() - 1;
            }

            if($max >= 30){
                $max = 30;
            }

            if($min <= -10){
                $min = -10;
            }

            $temperature = rand($min , $max);

            $this->setTemperature($temperature);

            return $this->temperature;
        }

        public function randomizeWindspeed(){

            $min = $this->getWindspeed() - 1;

            $max = $this->getWindspeed() + 1;

            if($max >= 10){
                $max = 10;
            }

            if($min <= 0){
                $min = 0;
            }

            $windspeed = rand($min , $max);

            $this->setWindspeed($windspeed);

            return $this->windspeed;
        }

        public function randomizeTotalDemand(Environment $enviroment){

            switch($enviroment->getHours()){
                case 0:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.15);
                    break;
                case 1:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.10);
                    break;
                case 2:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.10);
                    break;
                case 3:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.10);
                    break;
                case 4:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 5:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 6:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 7:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.05);
                    break;
                case 8:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.10);
                    break;
                case 9:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.20);
                    break;
                case 10:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.15);
                    break;
                case 11:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.05);
                    break;
                case 12:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 13:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 14:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.05);
                    break;
                case 15:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 16:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 17:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.20);
                    break;
                case 18:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() + ($this->getTotalDemand() * 0.20);
                    break;
                case 19:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 20:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand();
                    break;
                case 21:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.15);
                    break;
                case 22:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.15);
                    break;
                case 23:
                    $min = $this->getTotalDemand();

                    $max = $this->getTotalDemand() - ($this->getTotalDemand() * 0.15);
                    break;
            }
            echo "</br> ";
            echo $min;
            echo "</br> ";
            echo $max;

            //if($max >= 10000){
                //$max = 10000;
            //}

            //if($min <= 0){
                //$min = 0;
            //}

            $totaldemand = rand($min , $max);

            $this->setTotalDemand($totaldemand);

            //echo $min;
            //echo "</br>";

            return $this->totaldemand;
        }

        public function randomizeCoalDemand(){

            $min = $this->getCoalDemand() - 5;

            $max = $this->getCoalDemand() + 5;

            if($max >= 40){
                $max = 40;
            }

            if($min <= 20){
                $min = 20;
            }

            $coaldemand = rand($min , $max);

            $this->setCoalDemand($coaldemand);

            return $this->coaldemand;
        }

        public function randomizeNaturalGasDemand(){

            $min = $this->getNaturalGasDemand() - 5;

            $max = $this->getNaturalGasDemand() + 5;

            if($max >= 30){
                $max = 30;
            }

            if($min <= 15){
                $min = 15;
            }

            $naturalgasdemand = rand($min , $max);

            $this->setNaturalGasDemand($naturalgasdemand);

            return $this->naturalgasdemand;
        }

        public function randomizeNuclearDemand(){

            $min = $this->getNuclearDemand() - 5;

            $max = $this->getNuclearDemand() + 5;

            if($max >= 30){
                $max = 30;
            }

            if($min <= 15){
                $min = 15;
            }

            $nucleardemand = rand($min , $max);

            $this->setNuclearDemand($nucleardemand);

            return $this->nucleardemand;
        }

        public function randomizeWindDemand(){

            $min = $this->getWindDemand() - 3;

            $max = $this->getWindDemand() + 3;

            if($max >= 15){
                $max = 15;
            }

            if($min <= 5){
                $min = 5;
            }

            $winddemand = rand($min , $max);

            $this->setWindDemand($winddemand);

            return $this->winddemand;
        }

        public function randomizeSolarDemand(){

            $min = $this->getSolarDemand() - 3;

            $max = $this->getSolarDemand() + 3;

            if($max >= 10){
                $max = 10;
            }

            if($min <= 0){
                $min = 0;
            }

            $solardemand = rand($min , $max);

            $this->setSolarDemand($solardemand);

            return $this->solardemand;
        }

        public function makeHunderd(){

            $solardemand = $this->getSolarDemand();
            $winddemand = $this->getWindDemand();
            $coaldemand = $this->getCoalDemand();
            $naturalgasdemand = $this->getNaturalGasDemand();
            $nucleardemand = $this->getNuclearDemand();

            $total = $solardemand + $winddemand + $coaldemand + $naturalgasdemand + $nucleardemand;

            if($total < 100 || $total > 100 ){
                $difference = 100 - $total;

                $henk = $difference / 2;

                $coal = round($henk, 0, PHP_ROUND_HALF_UP); ;
                $naturalgas = round($henk, 0, PHP_ROUND_HALF_DOWN); ;

                $coaldemand = $this->getCoalDemand() + $coal;
                $naturalgasdemand = $this->getNaturalGasDemand() + $naturalgas;

                $this->setCoalDemand($coaldemand);
                $this->setNaturalGasDemand($naturalgasdemand);
            }

            $total = $this->getSolarDemand() + $this->getWindDemand() + $this->getCoalDemand() + $this->getNaturalGasDemand() + $this->getNuclearDemand();

            return $total;
        }

    }

?>