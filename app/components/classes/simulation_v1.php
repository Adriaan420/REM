<?php
    include_once("init.php");

    $consumer = new Consumer();

    $totaldemand = $consumer->setTotalDemand(100000);
    $winddemandpercentage = $consumer->setWindDemand(30);
    $coaldemandpercentage = $consumer->setCoalDemand(20);
    $gasdemandpercentage = $consumer->setGasDemand(20);
    $nucleardemandpercentage = $consumer->setNuclearDemand(20);
    $solardemandpercentage = $consumer->setSolarDemand(10);

    $coalpowerplant = new CoalPowerplant();
    $windpark = new WindPark();
    $solarpark = new SolarPark();
    $naturalgas = new NaturalGas();
    $nuclearplant = new NuclearPlant();
    $enviroment = new Environment();
    $energystorage = new EnergyStorage();

    $time = $enviroment->setTime(12,00);
    $temperature = $enviroment->setTemperature(15);
    $windspeed = $enviroment->setWindspeed(7);
    $solarstrength = $enviroment->setSolarstrenght(10);

    $numberswindmills = $windpark->setNumberOfWindmills(12);

    $capacity = $energystorage->setCapacity(16000);
    $windcapacity = $energystorage->setCapacityWind(15000);

    echo "Storage wind: " . $energystorage->getCapacityWind();
    echo "</br>";

    $coaldemand = $coalpowerplant->calculateEnergising($consumer);
    $coaldemandpercentagegreen = $coalpowerplant->setGreen(20);
    $coaldemandpercentagegray = $coalpowerplant->setGray(80);
    $coaldemandgreen = $coalpowerplant->calculateGreen();
    $coaldemandgray = $coalpowerplant->calculateGray();

    $winddemand = $windpark->calculateEnergising($consumer, $energystorage, $enviroment);
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
    echo "</br>";
    echo "Storage wind: " . $energystorage->getCapacityWind();
    echo "</br>";
    echo "Production wind: " . $windpark->getPowerGenerated();
?>