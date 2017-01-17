<?php
    class WindPark extends EnergySource {

        var $windpower = 0;
        var $store = 0;
        var $numberOfWindmills = 0;
        var $powerGenerated = 0;
        var $generatePowerOneWindmill = 0;
        var $energytype = 'windpark';

        public function setWindPower($windpower) {
            return $this->windpower = $windpower;
        }

        public function setNumberOfWindmills($numberOfWindmills) {
            return $this->numberOfWindmills = $numberOfWindmills;
        }

        public function powerGeneratedOneWindmill(Environment $environment){
            switch ($environment->getWindspeed()) {
                //Windmolen gebruikt NEG Micon 2750/92 Bron:http://www.motiva.fi/myllarin_tuulivoima/windpower%20web/en/tour/wres/pow/index.htm
                case 0:
                    return $this->generatePowerOneWindmill = 0;
                    break;
                case 1:
                    return $this->generatePowerOneWindmill = 0;
                    break;
                case 2:
                    return $this->generatePowerOneWindmill = 0;
                    break;
                case 3:
                    //54,9 + 185,3 / 2
                    return $this->generatePowerOneWindmill = 120;
                    break;
                case 4:
                    //369,4 + 618,8 / 2
                    return $this->generatePowerOneWindmill = 494;
                    break;
                case 5:
                    //941,4 + 1326,1 + 1741,3 / 3
                    return $this->generatePowerOneWindmill = 1336;
                    break;
                case 6:
                    //2132,9 + 2435,5 + 2616,9 / 3
                    return $this->generatePowerOneWindmill = 2395;
                    break;
                case 7:
                    //2701,8 + 2733,8 + 2744,1+ 2747,2 / 4
                    return $this->generatePowerOneWindmill = 2732;
                    break;
                case 8:
                    //2748 + 2748,3 + 2750 / 3
                    return $this->generatePowerOneWindmill = 2749;
                    break;
                case 9:
                    //2750 + 2750 + 2750 + 2750 / 4
                    return $this->generatePowerOneWindmill = 2750;
                    break;
                case 10:
                    //2750 + 0 + 0 / 3
                    return $this->generatePowerOneWindmill = 917;
                    break;
                default:
                    return $this->generatePowerOneWindmill = 0;
                    break;
            }
        }

        public function setPowerGenerated() {
            return $this->powerGenerated = $this->numberOfWindmills * $this->generatePowerOneWindmill;
        }

        public function getWindPower() {
            return $this->windpower;
        }

        public function getPowerGenerated() {
            return $this->powerGenerated;
        }

        public function calculateEnergising(Consumer $consumer, EnergyStorage $energyStorage, Environment $environment){
            $this->powerGeneratedOneWindmill($environment);
            $this->setPowerGenerated();
            $difference = $this->getPowerGenerated() - (($consumer->getTotalDemand() / 100) * $consumer->getWindDemand());
            if ($difference < 0){
                $transfer = -$energyStorage->pullWind($difference);
            }
            if ($difference > 0){
                $transfer = $energyStorage->pushWind($difference);
            }
            return $transfer;
        }

        public function calculatePricekWh(Environment $environment){
            $generatedPower = $this->powerGeneratedOneWindmill($environment);
            $efficiency = $generatedPower / 27.5;

            return $this->pricekWh = 0.03757 + ((0.08726 / 100) * (100-$efficiency));
        }
    }

?>