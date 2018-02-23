<?php

require_once '../controller/IndexController.php';

use \Slim\Slim as Slim;
use \HtmlGenerator\HtmlTag as HtmlTag;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates'
));

$app->get('/', function () use ($app) {
    // $indexCtrl = new IndexController();
    // _e(HtmlTag::createElement('a'));
    $app->render('indexTemplate.php');
});

$app->run();

?>
