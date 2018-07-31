<?php

$app = require_once __DIR__.'/../app/app.php';

echo $twig->render('page.html', array('text' => 'Oi!')); 

