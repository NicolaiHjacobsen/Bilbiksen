<?php

include_once 'config/core.php';

include_once 'config/database.php';

$database = new database();
$db = $database->getConnection();

$car = new Car($db);