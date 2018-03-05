<?php

require_once '../controller/AbonoController.php';

use \Slim\Slim as Slim;
use \HtmlGenerator\HtmlTag as HtmlTag;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/abono/'
));

$app->get('/', function () use ($app) {
    $tag = HtmlTag::createElement('a')
                    ->set('href','/abono.php/registrar')
                    ->text('Registrar abono');

    _e($tag);
    echo "<br /><a href='/abono.php/consultar'>Abonos</a><br />";
    echo "<a href='/abono.php/consultar/socio/1'>Abono por id socio</a><br />";
    echo "<a href='/abono.php/consultar/prestamo/1'>Abono por id prestamo</a><br />";
});

$app->get('/registrar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    $socios = $abonoCtrl->getSocios();
    $prestamos = $abonoCtrl->getPrestamos();

    $app->render('formulario_registro_abono.php', array('socios' => $socios, 'prestamos' => $prestamos));
});

$app->post('/registrar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    _d($abonoCtrl->insertAbono($_POST));
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
