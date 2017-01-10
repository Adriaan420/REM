<?php
    include_once("init.php");

    $consumer = new Consumer();

    $totaldemand = $consumer->setTotalDemand(100000000);
    $winddemandpercentage = $consumer->setWindDemand(5);
    $coaldemandpercentage = $consumer->setCoalDemand(40);
    $gasdemandpercentage = $consumer->setGasDemand(30);
    $nucleardemandpercentage = $consumer->setNuclearDemand(20);
    $solardemandpercentage = $consumer->setSolarDemand(5);

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
    $solarstrength = $enviroment->setSolarstrenght(99);

    $numberswindmills = $windpark->setNumberOfWindmills(2200);
    $numbersquaremeters = $solarpark->setSquareMeters(100000000);

    $capacity = $energystorage->setCapacity(30000);
    $windcapacity = $energystorage->setCapacityWind(5000);
    $solarcapacity = $energystorage->setCapacitySolar(5000);

    echo "Storage wind: " . $energystorage->getCapacityWind();
    echo "</br>";
    echo "Storage solar: " . $energystorage->getCapacitySolar();
    echo "</br>";
    echo "</br>";

    $coaldemand = $coalpowerplant->calculateEnergising($consumer);
    $coaldemandpercentagegreen = $coalpowerplant->setGreen(20);
    $coaldemandpercentagegray = $coalpowerplant->setGray(80);
    $coaldemandgreen = $coalpowerplant->calculateGreen();
    $coaldemandgray = $coalpowerplant->calculateGray();
    $coalgreenco2 = $coalpowerplant->calculateCO2green();
    $coalgrayco2 = $coalpowerplant->calculateCO2gray();

    $winddemand = $windpark->calculateEnergising($consumer, $energystorage, $enviroment);
    $solardemand = $solarpark->calculateEnergising($consumer, $energystorage, $enviroment);

    $naturalgasdemand = $naturalgas->calculateEnergising($consumer);
    $naturalgasdemandpercentagegreen = $naturalgas->setGreen(30);
    $naturalgasdemandpercentagegray = $naturalgas->setGray(70);
    $naturalgasdemandgreen = $naturalgas->calculateGreen();
    $naturalgasdemandgray = $naturalgas->calculateGray();
    $naturalgasgreenco2 = $naturalgas->calculateCO2green();
    $naturalgasgrayco2 = $naturalgas->calculateCO2gray();

    $nuclearplantdemand = $nuclearplant->calculateEnergising($consumer);

    echo "Solarstrength: " .$solarstrength. "%";
    echo "</br>";
    echo "Windspeed: " .$windspeed;
    echo "</br>";
    echo "Time: " .$time;
    echo "</br>";
    echo "Temperature: " .$temperature;
    echo "</br>";
    echo "Total kWh: " .$totaldemand;
    echo "</br>";
    echo "</br>";
    echo "Coalpowerplant kWh: " .$coaldemand;
    echo "</br>";
    echo "Coalpowerplant kWh(green): " .$coaldemandgreen;
    echo "</br>";
    echo "Coalpowerplant kWh(gray): " .$coaldemandgray;
    echo "</br>";
    echo "CO2 green coal: " . $coalgreenco2;
    echo "</br>";
    echo "CO2 gray coal: " . $coalgrayco2;
    echo "</br>";
    echo "</br>";
    echo "Production wind: " . $windpark->getPowerGenerated();
    echo "</br>";
    echo "Windpark kWh: " .$consumer->getTotalDemand() / 100 * $consumer->getWindDemand();
    echo "</br>";
    echo "Windpark kWh difference: " .$winddemand;
    echo "</br>";
    echo "</br>";
    echo "Production solar: " . $solarpark->getPowerGenerated();
    echo "</br>";
    echo "Solarpark kWh: " .$consumer->getTotalDemand() / 100 * $consumer->getSolarDemand();
    echo "</br>";
    echo "Solarpark kWh difference: " .$solardemand;
    echo "</br>";
    echo "</br>";
    echo "Naturalgas kWh: " .$naturalgasdemand;
    echo "</br>";
    echo "Natural Gas kWh(green): " .$naturalgasdemandgreen;
    echo "</br>";
    echo "Natural Gas kWh(gray): " .$naturalgasdemandgray;
    echo "</br>";
    echo "CO2 green Natural Gas: " . $naturalgasgreenco2;
    echo "</br>";
    echo "CO2 gray Natural Gas: " . $naturalgasgrayco2;
    echo "</br>";
    echo "</br>";
    echo "Nuclearplant kWh: " .$nuclearplantdemand;
    echo "</br>";
    echo "</br>";
    echo "Storage wind: " . $energystorage->getCapacityWind();
    echo "</br>";
    echo "Storage solar: " . $energystorage->getCapacitySolar();

?>