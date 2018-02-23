<?php

require_once '../controller/PrestamoController.php';

use \Slim\Slim as Slim;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/prestamo/'
));

$app->get('/', function () use ($app) {
    echo "<a href='/prestamo.php/registrar'>Registrar prestamo</a>";
});

$app->get('/registrar', function () use ($app) {
    $prestamoCtrl = new PrestamoController();
    $socios = $prestamoCtrl->getSocios();

    $app->render('formulario_registro_prestamo.php', array('socios' => $socios));
});

$app->post('/registrar', function () use ($app) {
    $prestamoCtrl = new PrestamoController();
    _d($prestamoCtrl->insertPrestamo($_POST));
});

$app->run();

?>
