<?php

require_once '../controller/AhorroController.php';

use \Slim\Slim as Slim;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/ahorro/'
));

$app->get('/', function () use ($app) {
    echo "<a href='/ahorro.php/registrar'>Registrar ahorro</a>";
});

$app->get('/registrar', function () use ($app) {
    $ahorroCtrl = new AhorroController();
    $socios = $ahorroCtrl->getSocios();

    $app->render('formulario_registro_ahorro.php', array('socios' => $socios));
});

$app->post('/registrar', function () use ($app) {
    $ahorroCtrl = new AhorroController();
    _d($ahorroCtrl->insertAhorro($_POST));
});

$app->run();

?>
