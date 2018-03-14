<?php

require_once $dir . '/models/Radar.php';

$id = $_REQUEST['id'];

Radar::remove($id);
$radars = Radar::all();

include $dir . '/views/radars/list.php';
