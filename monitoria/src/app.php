<?php

use IFPE\Monitoria\domain\controller\AppController;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once DBAPI;

$app = AppController::getInstance();

return $app;