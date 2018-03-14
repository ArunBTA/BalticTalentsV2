<?php

require_once $dir . '/models/Radar.php';

$id = $_REQUEST['id'];
$radar = Radar::get($id);

echo 'Cia reikia prideti htnl formos rodyma, kad koreguoti '.$id.' irasa';
