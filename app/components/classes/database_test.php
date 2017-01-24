<?php

include("init.php");

$database = new myPDO();

$sth = $database->prepare("SELECT * FROM energiebron");
$sth->execute();
$henk_bansberg = $sth->fetch(PDO::FETCH_ASSOC);

var_dump($henk_bansbergw);

?>