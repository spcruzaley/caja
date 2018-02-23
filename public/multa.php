<?php

require_once '../controller/MultaController.php';

use \Slim\Slim as Slim;
use \HtmlGenerator\HtmlTag as HtmlTag;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/multa/'
));

$app->get('/', function () use ($app) {
    $tag = HtmlTag::createElement('a')
                    ->set('href','/multa.php/registrar')
                    ->text('Registrar multa');

    _e($tag);
});

$app->get('/registrar', function () use ($app) {
    $multaCtrl = new MultaController();
    $socios = $multaCtrl->getSocios();
    $ahorros = $multaCtrl->getAhorros();

    $app->render('formulario_registro_multa.php', array('socios' => $socios, 'ahorros' => $ahorros));
});

$app->get('/consultar', function () use ($app) {
    $multaCtrl = new MultaController();
    $multas = $multaCtrl->getMultas();

    _d($multas);
});

$app->post('/registrar', function () use ($app) {
    $multaCtrl = new MultaController();
    _d($multaCtrl->insertMulta($_POST));
});

$app->run();

?>
