<?php

require_once '../controller/SocioController.php';

require '../views/CustomView.php';

use \Slim\Slim as Slim;

$view = new CustomView();

$app = new Slim(array(
    'debug' => true,
    'templates.path' => '../templates/socio/',
    'view' => $view
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
    $result = $socioCtrl->insertSocio($_POST);

    $app->render('formulario_registro_socio.php', $result);
});

$app->get('/consultar', function () use ($app) {
    $socioCtrl = new SocioController();
    $socios = $socioCtrl->getSocios();

    $app->render('consultar_socios.php', array('socios' => $socios,
                                            'scripts' => HtmlElements::getTableScripts(),
                                            'styles' => HtmlElements::getTableStyles()));
});

$app->get('/consultar/:id', function ($id) use ($app) {
    $socioCtrl = new SocioController();
    $socio = $socioCtrl->selectSocio($id);

    if($socioCtrl->hasElements($socio)) {
        //Getting ahorros
        $ahorros = $socio['data']->getAhorros();
        if($ahorros->isEmpty()) {
            $ahorros = [];
        }
        //Getting multas
        $multas = $socio['data']->getMultas();
        if($multas->isempty()) {
            $multas = [];
        }
        //Getting prestamos
        $prestamos = $socio['data']->getPrestamos();
        if($prestamos->isEmpty()) {
            $prestamos = [];
        }
        // //Getting prestamos
        $abonos = $socio['data']->getAbonos();
        if($abonos->isEmpty()) {
            $abonos = [];
        }

        $app->render('consultar_socio.php', array('socio' => $socio['data'],
                                                'ahorros' => $ahorros,
                                                'multas' => $multas,
                                                'prestamos' => $prestamos,
                                                'abonos' => $abonos));
    }
});

$app->post('/consultar/:id', function ($id) use ($app) {
    $socioCtrl = new SocioController();
    $socio = $socioCtrl->selectSocio($id);
    $semanaActual = Utils::getCurrentWeek();
    $semanaActualBol = false;
    $result = [];
    $max = 0;

    if($socioCtrl->hasElements($socio)) {
        $result += ['socio' => $socio['data']->toArray()];

        //Getting ahorros
        $ahorros = $socio['data']->getAhorros();
        if(!$ahorros->isEmpty()) {
            $result += ['ahorros' => $ahorros->toArray()];

            foreach ($ahorros as $key => $ahorro) {
                if($max < $ahorro->getSemana() && $ahorro->getSemana() < 40) {
                    $max = $ahorro->getSemana();
                }
                if($semanaActual == $ahorro->getSemana()) {
                    $semanaActualBol = true;
                }
            }

            if($max == $semanaActual) {
                $semanaActual += 1;
            } else if($max > $semanaActual && $semanaActualBol) {
                $semanaActual = $max + 1;
            }


            $result += ['semanaActual' => $semanaActual];
        }
        //Getting multas
        $multas = $socio['data']->getMultas();
        if(!$multas->isempty()) {
            $result += ['multas' => $multas->toArray()];
        }
        //Getting prestamos
        $prestamos = $socio['data']->getPrestamos();
        if(!$prestamos->isEmpty()) {
            $result += ['prestamos' => $prestamos->toArray()];
        }
        // //Getting prestamos
        $abonos = $socio['data']->getAbonos();
        if(!$abonos->isEmpty()) {
            $result += ['abonos' => $abonos->toArray()];
        }

        _e(json_encode($result));
    }
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
