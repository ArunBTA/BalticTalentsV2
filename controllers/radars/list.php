<?php

require_once $dir . '/models/Radar.php';

$radars = Radar::all();

include $dir . '/views/radars/list.php';
