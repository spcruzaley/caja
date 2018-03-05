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
    echo "<br /><a href='/multa.php/consultar'>Multas</a><br />";
    echo "<a href='/multa.php/consultar/1'>Multa por id</a><br />";
});

$app->get('/registrar', function () use ($app) {
    $multaCtrl = new MultaController();
    $socios = $multaCtrl->getSocios();
    $ahorros = $multaCtrl->getAhorros();

    $app->render('formulario_registro_multa.php', array('socios' => $socios, 'ahorros' => $ahorros));
});

$app->post('/registrar', function () use ($app) {
    $multaCtrl = new MultaController();
    _d($multaCtrl->insertMulta($_POST));
});

$app->get('/consultar', function () use ($app) {
    $multaCtrl = new MultaController();
    $multas = $multaCtrl->getMultas();

    _d($multas);
});

$app->get('/consultar/:id', function ($id) use ($app) {
    $multaCtrl = new MultaController();
    $multas = $multaCtrl->selectMultasBySocioId($id);

    _d($multas);
});

$app->run();

?>
