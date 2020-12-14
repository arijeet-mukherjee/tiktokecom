<?php

define("AUTH_USERNAME", 'com.truckbook.olx@gmail.com');
define("AUTH_PASSWORD", 'Arijeet@123');
$database_path='https://truckbook-4c90a.firebaseio.com';

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('key.json')->withDatabaseUri($database_path);

$database = $factory->createDatabase();
#$database_get=$factory->getDatabase();

return  $database;
?>