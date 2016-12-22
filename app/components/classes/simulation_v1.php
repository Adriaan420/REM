<?php
    include_once("init.php");

    $consumer = new Consumer();

    $totaldemand = $consumer->setTotalDemand(100);
    $winddemandpercentage = $consumer->setWindDemand(20);
    $coaldemandpercentage = $consumer->setCoalDemand(30);
    $gasdemandpercentage = $consumer->setGasDemand(20);
    $nucleardemandpercentage = $consumer->setNuclearDemand(20);
    $solardemandpercentage = $consumer->setSolarDemand(10);

    $coalpowerplant = new CoalPowerplant();
    $windpark = new WindPark();
    $solarpark = new SolarPark();
    $naturalgas = new NaturalGas();
    $nuclearplant = new NuclearPlant();
    $enviroment = new Environment();

    $time = $enviroment->setTime(12,00);
    $temperature = $enviroment->setTemperature(15);
    $windspeed = $enviroment->setWindspeed(500);
    $solarstrength = $enviroment->setSolarstrenght(10);

    $coaldemand = $coalpowerplant->calculateEnergising($consumer);
    $coaldemandpercentagegreen = $coalpowerplant->setGreen(20);
    $coaldemandpercentagegray = $coalpowerplant->setGray(80);
    $coaldemandgreen = $coalpowerplant->calculateGreen();
    $coaldemandgray = $coalpowerplant->calculateGray();

    $winddemand = $windpark->calculateEnergising($consumer);
    $solardemand = $solarpark->calculateEnergising($consumer);
    $naturalgasdemand = $naturalgas->calculateEnergising($consumer);
    $nuclearplantdemand = $nuclearplant->calculateEnergising($consumer);

    echo "Solarstrength: " .$solarstrength;
    echo "</br>";
    echo "Windspeed: " .$windspeed;
    echo "</br>";
    echo "Time: " .$time;
    echo "</br>";
    echo "Temperature: " .$temperature;
    echo "</br>";
    echo "Total kWh: " .$totaldemand;
    echo "</br>";
    echo "Coalpowerplant kWh: " .$coaldemand;
    echo "</br>";
    echo "Coalpowerplant kWh(green): " .$coaldemandgreen;
    echo "</br>";
    echo "Coalpowerplant kWh(gray): " .$coaldemandgray;
    echo "</br>";
    echo "Windpark kWh: " .$winddemand;
    echo "</br>";
    echo "Solarpark kWh: " .$solardemand;
    echo "</br>";
    echo "Naturalgas kWh: " .$naturalgasdemand;
    echo "</br>";
    echo "Nuclearplant kWh: " .$nuclearplantdemand;
?>