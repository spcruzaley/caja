<?php

require_once '../controller/SocioController.php';

use \Slim\Slim as Slim;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/socio/'
));

$app->get('/', function () use ($app) {
    echo "<a href='/socio.php/registrar'>Registrar socio</a><br />";
    echo "<a href='/socio.php/consultar'>Socios</a><br />";
    echo "<a href='/socio.php/consultar/1'>Socio por id</a><br />";
    echo "<a href='/socio.php/actualizar/1'>Actualizar socio</a><br />";
    echo "<a href='/socio.php/desactivar/1000'>Desactivar socio</a><br />";
    // echo "<a href='/socio.php/eliminar/1000'>Eliminar socio</a><br />";
});

$app->get('/registrar', function () use ($app) {
    $app->render('formulario_registro_socio.php');
});

$app->post('/registrar', function () use ($app) {
    $socioCtrl = new SocioController();
    _d($socioCtrl->insertSocio($_POST));
});

$app->get('/consultar', function () use ($app) {
    $socioCtrl = new SocioController();
    $socios = $socioCtrl->getSocios();

    foreach ($socios as $key => $socio) {
        _d($socio);
        _e("<br /><hr /><br />");
    }
});

$app->get('/consultar/:id', function ($id) use ($app) {
    $socioCtrl = new SocioController();
    $socio = $socioCtrl->selectSocio($id);

    _d($socio);
});

$app->get('/actualizar/:id', function ($id) use ($app) {
    $socioCtrl = new SocioController();
    $socio = $socioCtrl->selectSocio($id);

    if($socio['status'] === 'success') {
        $app->render('formulario_actualizar_socio.php', array('socio' => $socio['data']));
    } else {
        _e("No existe socio");
    }
});

$app->post('/actualizar', function () use ($app) {
    $socioCtrl = new SocioController();
    $retorno = $socioCtrl->updateSocio($_POST);

    _d($retorno);
});

$app->get('/desactivar/:id', function ($id) use ($app) {
    $socioCtrl = new SocioController();
    $retorno = $socioCtrl->disableSocio($id);

    _d($retorno);
});

// $app->get('/eliminar/:id', function ($id) use ($app) {
//     $socioCtrl = new SocioController();
//     $retorno = $socioCtrl->deleteSocio($id);
//
//     _d($retorno);
// });

$app->run();

?>
