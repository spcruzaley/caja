<?php

require_once '../controller/SocioController.php';

use \Slim\Slim as Slim;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/socio/'
));

$app->get('/', function () use ($app) {
    echo "<a href='/socio.php/registrar'>Registrar</a>";
});

$app->get('/registrar', function () use ($app) {
    $app->render('formulario_registro_socio.php');
});

$app->post('/registrar', function () use ($app) {
    $socioCtrl = new SocioController();
    _d($socioCtrl->insertSocio($_POST));
});

$app->get('/consultar/:id', function ($id) use ($app) {
    $socioCtrl = new SocioController();
    _d($socioCtrl->selectSocio($id));
});

$app->run();

?>
