<?php

require_once '../controller/AbonoController.php';
require '../views/CustomView.php';

use \Slim\Slim as Slim;

$view = new CustomView();

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/abono/',
    'view' => $view
));

$app->get('/', function () use ($app) {
    echo "<br /><a href='/abono.php/consultar'>Abonos</a><br />";
    echo "<a href='/abono.php/consultar/socio/1'>Abono por id socio</a><br />";
    echo "<a href='/abono.php/consultar/prestamo/1'>Abono por id prestamo</a><br />";
});

$app->get('/registrar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    $socios = $abonoCtrl->getSocios();
    $scripts = HtmlElements::getSelectScripts();
    $scripts .= HtmlElements::getAbonoScripts();

    $app->render('formulario_registro_abono.php', array('socios' => $socios,
                                'scripts' => $scripts,
                                'styles' => HtmlElements::getSelectStyles()));
});

$app->post('/registrar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    $result = $abonoCtrl->insertAbono($_POST);

    _e(json_encode($result));
});

$app->get('/consultar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    $abonos = $abonoCtrl->getAbonos();

    _d($abonos);
});

$app->get('/consultar/socio/:id', function ($id) use ($app) {
    $abonoCtrl = new AbonoController();
    $abonos = $abonoCtrl->selectAbonosBySocioId($id);

    _d($abonos);
});

$app->get('/consultar/prestamo/:id', function ($id) use ($app) {
    $abonoCtrl = new AbonoController();
    $abonos = $abonoCtrl->selectAbonosByPrestamoId($id);

    _d($abonos);
});

$app->run();

?>
