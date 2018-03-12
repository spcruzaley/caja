<?php

require_once '../controller/PrestamoController.php';
require '../views/CustomView.php';

use \Slim\Slim as Slim;

$view = new CustomView();

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/prestamo/',
    'view' => $view
));

$app->get('/', function () use ($app) {
    echo "<a href='/prestamo.php/registrar'>Registrar prestamo</a><br />";
    echo "<a href='/prestamo.php/consultar'>Prestamos</a><br />";
    echo "<a href='/prestamo.php/consultar/1'>Prestamo por id</a><br />";
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

$app->get('/consultar', function () use ($app) {
    $prestamoCtrl = new PrestamoController();
    $prestamos = $prestamoCtrl->getPrestamos();

    _d($prestamos);
});

$app->get('/consultar/:id', function ($id) use ($app) {
    $prestamoCtrl = new PrestamoController();
    $prestamos = $prestamoCtrl->selectPrestamosBySocioId($id);

    _d($prestamos);
});

$app->run();

?>
