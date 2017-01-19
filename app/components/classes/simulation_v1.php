<?php
    include_once("init.php");

    //Alles random bepalen
    $random = new Randomizer();

    $random->setTemperature(15);
    $random->setSolarStrenght(65);
    $random->setWindspeed(6);

    $random->randomizeSolarStrenght();
    $random->randomizeTemperature();
    $random->randomizeWindspeed();

    $random->setTotalDemand(10000);
    $random->setCoalDemand(30);
    $random->setSolarDemand(5);
    $random->setWindDemand(10);
    $random->setNaturalGasDemand(30);
    $random->setNuclearDemand(25);

    $random->randomizeCoalDemand();
    $random->randomizeSolarDemand();
    $random->randomizeWindDemand();
    $random->randomizeNaturalGasDemand();
    $random->randomizeNuclearDemand();
    $random->makeHunderd();

    //Vraag en energiebronnen aanmaken
    $consumer = new Consumer();
    $consumer->setTotalDemand($random->getTotalDemand());
    $consumer->setWindDemand($random->getWindDemand());
    $consumer->setCoalDemand($random->getCoalDemand());
    $consumer->setNaturalGasDemand($random->getNaturalGasDemand());
    $consumer->setNuclearDemand($random->getNuclearDemand());
    $consumer->setSolarDemand($random->getSolarDemand());

    $enviroment = new Environment();
    $enviroment->setTime(12,00);
    $enviroment->setTemperature($random->getTemperature());
    $enviroment->setWindSpeed($random->getWindspeed());
    $enviroment->setSolarStrenght($random->getSolarStrenght());

    $coalpowerplant = new CoalPowerplant();
    $coalpowerplant->setGreen(20);
    $coalpowerplant->setGray(80);
    $coalpowerplant->setPricekWhCO2emission(0.01);

    $windpark = new WindPark();
    $windpark->setNumberOfWindmills(2);

    $solarpark = new SolarPark();
    $solarpark->setSquareMeters(50000);

    $naturalgas = new NaturalGas();
    $naturalgas->setGreen(30);
    $naturalgas->setGray(70);

    $nuclearplant = new NuclearPlant();

    $energystorage = new EnergyStorage();
    $energystorage->setCapacity(10000);
    $energystorage->setCapacityWind(500);
    $energystorage->setCapacitySolar(500);

    //Gegevens laten tonen voor berekeningen
    echo "<table border='0'>";
    echo "<tr><td>De totale vraag:</td><td>". $consumer->getTotalDemand(). "</td><td>kWh</td><td>100%</td></tr>";
    echo "<tr><td>- Kool energie:</td><td>". $consumer->getCoalDemand()*$consumer->getTotalDemand()/100 ."</td><td>kWh</td><td>". $consumer->getCoalDemand(). " %</td></tr>";
    echo "<tr><td>- Gas energie:</td><td>". $consumer->getNaturalGasDemand()*$consumer->getTotalDemand()/100 ."</td><td>kWh</td><td>". $consumer->getNaturalGasDemand(). " %</td></tr>";
    echo "<tr><td>- Kernenergie:</td><td>". $consumer->getNuclearDemand()*$consumer->getTotalDemand()/100 ."</td><td>kWh</td><td>". $consumer->getNuclearDemand(). " %</td></tr>";
    echo "<tr><td>- Windenergie:</td><td>". $consumer->getWindDemand()*$consumer->getTotalDemand()/100 ."</td><td>kWh</td><td>". $consumer->getWindDemand(). " %</td></tr>";
    echo "<tr><td>- Zonne-energie:</td><td>". $consumer->getSolarDemand()*$consumer->getTotalDemand()/100 ."</td><td>kWh</td><td>". $consumer->getSolarDemand(). " %</td></tr>";
    echo "</table>";

    echo "</br>";

    echo "<table border='0'>";
    echo "<tr><td>Tijd:</td><td>". $enviroment->getTime(). "</td></tr>";
    echo "<tr><td>Temperatuur:</td><td>". $enviroment->getTemperature(). " &deg;C</td></tr>";
    echo "<tr><td>Windkracht:</td><td>". $enviroment->getWindSpeed(). "</td></tr>";
    echo "<tr><td>Zonnekracht:</td><td>". $enviroment->getSolarStrenght(). " %</td></tr>";
    echo "</table>";

    echo "</br>";

    echo "<table border='0'>";
    echo "<tr><td>Energie-opslag capaciteit</td><td>". $energystorage->getCapacity(). "</td><td>kWh</td><td>100%</td></tr>";
    echo "<tr><td>- Windenergie</td><td>". $energystorage->getCapacityWind(). "</td><td>kWh</td><td>".($energystorage->getCapacityWind())/$energystorage->getCapacity()*100 ."%</td></tr>";
    echo "<tr><td>- Zonne-energie</td><td>". $energystorage->getCapacitySolar(). "</td><td>kWh</td><td>".($energystorage->getCapacitySolar())/$energystorage->getCapacity()*100 ."%</td></tr>";
    echo "</table>";

    echo "</br>";

    //Alles uitrekenen
    $coalpowerplant->calculateEnergising($consumer);
    $coalpowerplant->calculatePricekWh();
    $coalpowerplant->setPricekWhCO2emission(($coalpowerplant->getPricekWh() * 0.56));

    $windtransfer = $windpark->calculateEnergising($consumer, $energystorage, $enviroment);
    $windpark->calculatePricekWh($enviroment);

    $solartransfer = $solarpark->calculateEnergising($consumer, $energystorage, $enviroment);
    $solarpark->calculatePricekWh($enviroment);

    $naturalgas->calculateEnergising($consumer);
    $naturalgas->calculatePricekWh();
    $naturalgas->setPricekWhCO2emission(($naturalgas->getPricekWh() * 0.56));

    $nuclearplant->calculateEnergising($consumer);
    $nuclearplant->calculatePricekWh();

    //Gegevens laten tonen na berekeningen
    echo "<table border='0'>";
    echo "<tr><td>Opwekking kool energie</td><td>". $coalpowerplant->getEnergising() ."</td><td>kWh</td><td>100%</td></tr>";
    echo "<tr><td>- Groen</td><td>". $coalpowerplant->calculateGreen(). "</td><td>kWh</td><td>". $coalpowerplant->getGreen(). "%</td></tr>";
    echo "<tr><td>- Grijs</td><td>". $coalpowerplant->calculateGray(). "</td><td>kWh</td><td>". $coalpowerplant->getGray(). "%</td></tr>";
    echo "<tr><td>&nbsp</td></tr>";
    echo "<tr><td>Opwekking gas energie</td><td>". $naturalgas->getEnergising() ."</td><td>kWh</td><td>100%</td></tr>";
    echo "<tr><td>- Groen</td><td>". $naturalgas->calculateGreen(). "</td><td>kWh</td><td>". $naturalgas->getGreen(). "%</td></tr>";
    echo "<tr><td>- Grijs</td><td>". $naturalgas->calculateGray(). "</td><td>kWh</td><td>". $naturalgas->getGray(). "%</td></tr>";
    echo "<tr><td>&nbsp</td></tr>";
    echo "<tr><td>Opwekking kernenergie</td><td>". $nuclearplant->getEnergising() ."</td><td>kWh</td><td>100%</td></tr>";
    echo "<tr><td>&nbsp</td></tr>";
    echo "<tr><td>Opwekking windenergie</td><td>". $windpark->getPowerGenerated() ."</td><td>kWh</td></tr>";
    echo "<tr><td>&nbsp</td></tr>";
    echo "<tr><td>Opwekking zonne-energie</td><td>". $solarpark->getPowerGenerated() ."</td><td>kWh</td></tr>";
    echo "<tr><td>&nbsp</td></tr>";
    echo "</table>";

    echo "</br>";
    echo "<table border='0'>";
    echo "<tr><td>Energie-opslag capaciteit</td><td>". $energystorage->getCapacity(). "</td><td>kWh</td><td>100%</td></tr>";
    echo "<tr><td>- Windenergie</td><td>". $energystorage->getCapacityWind(). "</td><td>kWh</td><td>".($energystorage->getCapacityWind())/$energystorage->getCapacity()*100 ."%</td></tr>";
    echo "<tr><td>- Zonne-energie</td><td>". $energystorage->getCapacitySolar(). "</td><td>kWh</td><td>".($energystorage->getCapacitySolar())/$energystorage->getCapacity()*100 ."%</td></tr>";
    echo "</table>";

    echo "</br>";

    echo "<table border='0'>";
    echo "<tr><td>Getransfereerd:</td></tr>";
    echo "<tr><td>- Windenergie</td><td>". $windtransfer."</td></tr>";
    echo "<tr><td>- Zonne-energie</td><td>". $solartransfer."</td></tr>";
    echo "</table>";

    echo "</br>";
    echo "<table border='0'>";
    echo "<tr><td>Total CO2 uitstoot:</td><td></td></t></tr>";
    echo "<tr><td>- Kool energie:</td><td>". $coalpowerplant->calculateCO2gray(). "</td><td>KG</td><td>&nbsp&nbsp&nbsp</td><td>Afgevangen:</td><td>". $coalpowerplant->calculateCO2green()."</td><td>KG</td></tr>";
    echo "<tr><td>- Gas energie:</td><td>". $naturalgas->calculateCO2gray(). "</td><td>KG</td><td>&nbsp&nbsp&nbsp</td><td>Afgevangen:</td><td>". $naturalgas->calculateCO2green()."</td><td>KG</td></tr>";
    echo "</table>";

    echo "</br>";
    echo "<table border='0'>";
    echo "<tr><td>Prijzen</td></tr>";
    echo "<tr><td>- Kool energie (grijs):</td><td>&euro; ". $coalpowerplant->getPricekWh(). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Kool energie totaal (grijs):</td><td>&euro; ". $coalpowerplant->getEnergising() * $coalpowerplant->getPricekWh() * $coalpowerplant->getGray() / 100 . "</td></tr>";
    echo "<tr><td>- Kool energie (groen):</td><td>&euro; ". ($coalpowerplant->getPricekWh() + $coalpowerplant->getPricekWhCO2emission()). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Kool energie totaal (groen):</td><td>&euro; ". $coalpowerplant->getEnergising() * $coalpowerplant->getPricekWh() * $coalpowerplant->getGreen() / 100 . "</td></tr>";
    echo "<tr><td>- Gas energie (grijs):</td><td>&euro; ". $naturalgas->getPricekWh(). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Gas energie totaal (grijs):</td><td>&euro; ". $naturalgas->getEnergising() * $naturalgas->getPricekWh() * $naturalgas->getGray() / 100 . "</td></tr>";
    echo "<tr><td>- Gas energie (groen):</td><td>&euro; ". ($naturalgas->getPricekWh() + $naturalgas->getPricekWhCO2emission()). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Gas energie totaal (groen):</td><td>&euro; ". $naturalgas->getEnergising() * $naturalgas->getPricekWh() * $naturalgas->getGreen() / 100 . "</td></tr>";
    echo "<tr><td>- Kernenergie:</td><td>&euro; ". $nuclearplant->getPricekWh(). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Kernenergie totaal:</td><td>&euro; ". $nuclearplant->getEnergising() * $nuclearplant->getPricekWh(). "</td></tr>";
    echo "<tr><td>- Windenergie:</td><td>&euro; ". $windpark->getPricekWh(). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Windenergie totaal:</td><td>&euro; ". $windpark->getPowerGenerated() * $windpark->getPricekWh(). "</td></tr>";
    echo "<tr><td>- Zonne-energie:</td><td>&euro; ". $solarpark->getPricekWh(). "</td><td>per kWh</td><td>&nbsp&nbsp&nbsp</td><td>Zonne-energie totaal:</td><td>&euro; ". $solarpark->getPowerGenerated() * $solarpark->getPricekWh(). "</td></tr>";
    echo "</table>";

    //Alles in de database zetten
    $database = new myPDO();

    $query = "INSERT INTO `omstandigheid` (`omstandigheid_tijd`, `omstandigheid_temperatuur`, `omstandigheid_zonnekracht`, `omstandigheid_windkracht`, `omstandigheid_energievraag`) VALUES ('". $enviroment->getTime() .":00', '".$enviroment->getTemperature() ."', '".$enviroment->getSolarStrenght() ."', '".$enviroment->getWindSpeed() ."', '".$consumer->getTotalDemand() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenviroment = $database->lastInsertId();

    $query = "INSERT INTO `energieopslag` (`energieopslag_capaciteit`) VALUES ('".$energystorage->getCapacity() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenergystorage = $database->lastInsertId();

    $query = "INSERT INTO `energiebron` (`energiebron_naam`, `energiebron_co2`) VALUES ('".$coalpowerplant->getEnergyType() ."', ". ($coalpowerplant->calculateCO2gray() + $coalpowerplant->calculateCO2green()) .");";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenergysource = $database->lastInsertId();
    $query = "INSERT INTO `omstandigheid_energiebron` (`energievraag_energiebron_omstandigheid`, `energievraag_energiebron_energiebron`, `energievraag_energiebron_percentage`) VALUES ('".$idenviroment ."', '".$idenergysource ."', '".$consumer->getCoalDemand() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `omstandigheid_energiebron_prijs` (`omstandigheid_energiebron_prijs_omstandigheid`, `omstandigheid_energiebron_prijs_energiebron`, `omstandigheid_energiebron_prijs_prijs`) VALUES ('".$idenviroment ."', '".$idenergysource ."', ".$coalpowerplant->getPricekWh() .");";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `co2_mitigatie_energiebron` (`co2_mitigatie_energiebron_energiebron`, `co2_mitigatie_energiebron_afgevangen`) VALUES ('".$idenergysource ."', '".$coalpowerplant->calculateCO2green() ."');";
    $statement = $database->prepare($query);
    $statement->execute();

    $query = "INSERT INTO `energiebron` (`energiebron_naam`, `energiebron_co2`) VALUES ('".$naturalgas->getEnergyType() ."', ". ($naturalgas->calculateCO2gray() + $naturalgas->calculateCO2green()) .");";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenergysource = $database->lastInsertId();
    $query = "INSERT INTO `omstandigheid_energiebron` (`energievraag_energiebron_omstandigheid`, `energievraag_energiebron_energiebron`, `energievraag_energiebron_percentage`) VALUES ('".$idenviroment ."', '".$idenergysource ."', '".$consumer->getNaturalGasDemand() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `omstandigheid_energiebron_prijs` (`omstandigheid_energiebron_prijs_omstandigheid`, `omstandigheid_energiebron_prijs_energiebron`, `omstandigheid_energiebron_prijs_prijs`) VALUES ('".$idenviroment ."', '".$idenergysource ."', ".$naturalgas->getPricekWh() .");";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `co2_mitigatie_energiebron` (`co2_mitigatie_energiebron_energiebron`, `co2_mitigatie_energiebron_afgevangen`) VALUES ('".$idenergysource ."', '".$naturalgas->calculateCO2green() ."');";
    $statement = $database->prepare($query);
    $statement->execute();

    $query = "INSERT INTO `energiebron` (`energiebron_naam`) VALUES ('".$nuclearplant->getEnergyType() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenergysource = $database->lastInsertId();
    $query = "INSERT INTO `omstandigheid_energiebron` (`energievraag_energiebron_omstandigheid`, `energievraag_energiebron_energiebron`, `energievraag_energiebron_percentage`) VALUES ('".$idenviroment ."', '".$idenergysource ."', '".$consumer->getNuclearDemand() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `omstandigheid_energiebron_prijs` (`omstandigheid_energiebron_prijs_omstandigheid`, `omstandigheid_energiebron_prijs_energiebron`, `omstandigheid_energiebron_prijs_prijs`) VALUES ('".$idenviroment ."', '".$idenergysource ."', ".$nuclearplant->getPricekWh() .");";
    $statement = $database->prepare($query);
    $statement->execute();

    $query = "INSERT INTO `energiebron` (`energiebron_naam`) VALUES ('".$windpark->getEnergyType() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenergysource = $database->lastInsertId();
    $query = "INSERT INTO `omstandigheid_energiebron` (`energievraag_energiebron_omstandigheid`, `energievraag_energiebron_energiebron`, `energievraag_energiebron_percentage`) VALUES ('".$idenviroment ."', '".$idenergysource ."', '".$consumer->getWindDemand() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `omstandigheid_energiebron_prijs` (`omstandigheid_energiebron_prijs_omstandigheid`, `omstandigheid_energiebron_prijs_energiebron`, `omstandigheid_energiebron_prijs_prijs`) VALUES ('".$idenviroment ."', '".$idenergysource ."', ".$windpark->getPricekWh() .");";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `energieopslag_energiebron` (`energieopslag_energiebron_energieopslag`, `energieopslag_energiebron_energiebron`, `energieopslag_energiebron_kw`) VALUES ('".$idenergystorage ."', '".$idenergysource ."', '".$energystorage->getCapacityWind() ."');";
    $statement = $database->prepare($query);
    $statement->execute();

    $query = "INSERT INTO `energiebron` (`energiebron_naam`) VALUES ('".$solarpark->getEnergyType() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $idenergysource = $database->lastInsertId();
    $query = "INSERT INTO `omstandigheid_energiebron` (`energievraag_energiebron_omstandigheid`, `energievraag_energiebron_energiebron`, `energievraag_energiebron_percentage`) VALUES ('".$idenviroment ."', '".$idenergysource ."', '".$consumer->getSolarDemand() ."');";
    $statement = $database->prepare($query);
    $statement->execute();
    $query = "INSERT INTO `omstandigheid_energiebron_prijs` (`omstandigheid_energiebron_prijs_omstandigheid`, `omstandigheid_energiebron_prijs_energiebron`, `omstandigheid_energiebron_prijs_prijs`) VALUES ('".$idenviroment ."', '".$idenergysource ."', ".$solarpark->getPricekWh() .");";
    $statement = $database->prepare($query);
    $statement->execute();

    //echo $query;

    $query = "INSERT INTO `energieopslag_energiebron` (`energieopslag_energiebron_energieopslag`, `energieopslag_energiebron_energiebron`, `energieopslag_energiebron_kw`) VALUES ('".$idenergystorage ."', '".$idenergysource ."', '".$energystorage->getCapacitySolar() ."');";
    $statement = $database->prepare($query);
    $statement->execute();


?>