<?php

require_once('./lib/Medoo.php');

use Medoo\Medoo;

$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'virtual_forest',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
]);
