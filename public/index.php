<?php

require '../controller/IndexController.php';
require '../views/CustomView.php';

use \Slim\Slim as Slim;
use \HtmlGenerator\HtmlTag as HtmlTag;

$view = new CustomView();

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates',
    'view' => $view
));

$app->get('/', function () use ($app) {
    $data = array('title' => "Dashboard", );
    
    $app->render('indexTemplate.php');
    //$app->render('home.php');
});

$app->run();

?>
