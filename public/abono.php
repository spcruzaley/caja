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
});

$app->get('/registrar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    $socios = $abonoCtrl->getSocios();
    $prestamos = $abonoCtrl->getPrestamos();

    $app->render('formulario_registro_abono.php', array('socios' => $socios, 'prestamos' => $prestamos));
});

$app->get('/consultar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    $abonos = $abonoCtrl->getAbonos();

    _d($abonos);
});

$app->post('/registrar', function () use ($app) {
    $abonoCtrl = new AbonoController();
    _d($abonoCtrl->insertAbono($_POST));
});

$app->run();

?>
