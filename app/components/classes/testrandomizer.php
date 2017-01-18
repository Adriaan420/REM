<?php
    session_start();
    include_once("init.php");

    $random = new randomizer();

    if (isset($_SESSION['solarstrenght'])){
        $random->setSolarStrenght($_SESSION['solarstrenght']);
    }
    else{
        $random->setSolarStrenght(75);
    }

    $random->randomizeSolarStrenght();
    $_SESSION['solarstrenght'] = $random->getSolarStrenght();
    echo "</br>";
    echo $_SESSION['solarstrenght'];
    echo "</br>";

    if (isset($_SESSION['temperature'])){
        $random->setTemperature($_SESSION['temperature']);
    }
    else{
        $random->setTemperature(15);
    }

    $random->randomizeTemperature();
    $_SESSION['temperature'] = $random->getTemperature();
    echo "</br>";
    echo $_SESSION['temperature'];
    echo "</br>";

    if (isset($_SESSION['windspeed'])){
        $random->setWindspeed($_SESSION['windspeed']);
    }
    else{
        $random->setWindspeed(5);
    }

    $random->randomizeWindspeed();
    $_SESSION['windspeed'] = $random->getWindspeed();
    echo "</br>";
    echo $_SESSION['windspeed'];
    echo "</br>";

    if (isset($_SESSION['totaldemand'])){
        $random->setTotalDemand($_SESSION['totaldemand']);
    }
    else{
        $random->setTotalDemand(5000);
    }

    $random->randomizeTotalDemand();
    $_SESSION['totaldemand'] = $random->getTotalDemand();
    echo "</br>";
    echo $_SESSION['totaldemand'];
    echo "</br>";

    if (isset($_SESSION['coaldemand'])){
        $random->setCoalDemand($_SESSION['coaldemand']);
    }
    else{
        $random->setCoalDemand(33);
    }

    $random->randomizeCoalDemand();
    $_SESSION['coaldemand'] = $random->getCoalDemand();

    echo "</br>";
    echo $_SESSION['coaldemand'];
    echo "</br>";

    if (isset($_SESSION['naturalgasdemand'])){
        $random->setNaturalGasDemand($_SESSION['naturalgasdemand']);
    }
    else{
        $random->setNaturalGasDemand(25);
    }

    $random->randomizeNaturalGasDemand();
    $_SESSION['naturalgasdemand'] = $random->getNaturalGasDemand();
    echo "</br>";
    echo $_SESSION['naturalgasdemand'];
    echo "</br>";

    if (isset($_SESSION['nucleardemand'])){
        $random->setNuclearDemand($_SESSION['nucleardemand']);
    }
    else{
        $random->setNuclearDemand(33);
    }

    $random->randomizeNuclearDemand();
    $_SESSION['nucleardemand'] = $random->getNuclearDemand();
    echo "</br>";
    echo $_SESSION['nucleardemand'];
    echo "</br>";

    if (isset($_SESSION['winddemand'])){
        $random->setWindDemand($_SESSION['winddemand']);
    }
    else{
        $random->setWindDemand(10);
    }

    $random->randomizeWindDemand();
    $_SESSION['winddemand'] = $random->getWindDemand();
    echo "</br>";
    echo $_SESSION['winddemand'];
    echo "</br>";

    if (isset($_SESSION['solardemand'])){
        $random->setSolarDemand($_SESSION['solardemand']);
    }
    else{
        $random->setSolarDemand(5);
    }

    $random->randomizeSolarDemand();
    $_SESSION['solardemand'] = $random->getSolarDemand();
    echo "</br>";
    echo $_SESSION['solardemand'];
    echo "</br>";

    echo "</br>";
    echo $random->makeHunderd();
    echo "</br>";
    //session_destroy();
?>