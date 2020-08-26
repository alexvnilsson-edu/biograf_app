<?php

$pengar = array("Oscar"=>5000, "Bengt"=>10000, "Anna"=>15000);

$vem = "Bengt";
$vem_har = $pengar[$vem];
echo("$vem har $vem_har kr." . PHP_EOL);