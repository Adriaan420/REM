<?php

    class Coalpowerpplant extends Energysource{

        var $coal = 0;
        var $energising = 0;

        function setCoal($coal) {
            return $this->coal = $coal;
        }

        public function setEnergising($energising){
            return $this->energising = $energising;
        }

        function getCoal() {
            return $this->coal;
        }

        public function getEnergising(){
            return $this->energising;
        }

        public function calculateEnergising(){

        }

    }

?>