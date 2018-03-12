<?php

require_once '../controller/AhorroController.php';
require '../views/CustomView.php';

use \Slim\Slim as Slim;

$view = new CustomView();

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/ahorro/',
    'view' => $view
));

$app->get('/', function () use ($app) {
    echo "<a href='/ahorro.php/registrar'>Registrar ahorro</a><br />";
    echo "<a href='/ahorro.php/consultar'>Ahorros</a><br />";
    echo "<a href='/ahorro.php/consultar/1'>Ahorro por id</a><br />";
});

$app->get('/registrar', function () use ($app) {
    $ahorroCtrl = new AhorroController();
    $socios = $ahorroCtrl->getSocios();
    $scripts = HtmlElements::getSelectScripts();
    $scripts .= HtmlElements::getAhorroScripts();

    $app->render('formulario_registro_ahorro.php', array('socios' => $socios,
                                                        'scripts' => $scripts,
                                                        'styles' => HtmlElements::getSelectStyles()));
});

$app->post('/registrar', function () use ($app) {
    $ahorroCtrl = new AhorroController();

    if(!isset($_POST['checkSemanaActual'])) {
        $data = [];
        $bulkResult = [];
        for ($i=1; $i <= 40 ; $i++) {
            if(isset($_POST['checkSemana'.$i])) {
                $data = array('socioId' => $_POST['socioId'],
                                'semana' => $i);

                $result = $ahorroCtrl->insertAhorro($data);

                if($result['status'] === "danger") {
                    break;
                }
            }
        }
    } else {
        $result = $ahorroCtrl->insertAhorro($_POST);
    }

    _e(json_encode($result));

});

$app->get('/consultar', function () use ($app) {
    $ahorroCtrl = new AhorroController();
    $ahorros = $ahorroCtrl->getAhorros();

    _d($ahorros);
});

$app->get('/consultar/:id', function ($id) use ($app) {
    $ahorroCtrl = new AhorroController();
    $ahorros = $ahorroCtrl->selectAhorrosBySocioId($id);

    _d($ahorros);
});

$app->run();

?>
