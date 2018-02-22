<?php

require 'Controller.php';

class AhorroController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function insertAhorro($data) {
        try {
            $ahorro = new Ahorro();
            $ahorro->setSocioId($data['socioId']);
            $ahorro->setSemana($data['semana']);
            $retorno = $ahorro->save();

            if($retorno > 0) {
                return $this->success("El ahorro se ha registrado de manera correcta");
            } else {
                return $this->warning("El ahorro no se registro, vuelva a intentarlo.", $retorno);
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al agregar el ahorro.", $e);
        }
    }

}

?>