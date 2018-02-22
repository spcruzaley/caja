<?php

require_once '../controller/IndexController.php';

use \Slim\Slim as Slim;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates'
));

$app->get('/', function () use ($app) {
    $indexCtrl = new IndexController();

    $app->render('indexTemplate.php', array('socios' => $indexCtrl->getSocios()));
});

$app->run();

?>
