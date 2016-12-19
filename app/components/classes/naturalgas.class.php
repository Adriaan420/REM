<?php

    class Naturalgas extends Energysource {

        var $gas = 0;
        var $energising = 0;

        function setGas($gas) {
            return $this->gas = $gas;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        function getGas() {
            return $this->gas;
        }

        public function getEnergising(){
            return $this->energising;
        }

        public function calculateEnergising(){

        }

    }

?>