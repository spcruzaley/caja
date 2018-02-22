<?php

require 'Controller.php';

class MultaController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function insertMulta($data) {
        try {
            $multa = new Multa();
            $multa->setSocioId($data['socioId']);
            $multa->setAhorroId($data['ahorroId']);
            $multa->setCantidad($data['cantidad']);
            $multa->setComentario($data['comentario']);
            $retorno = $multa->save();

            if($retorno > 0) {
                return $this->success("La multa se ha registrado de manera correcta");
            } else {
                return $this->warning("La multa no se registro, vuelva a intentarlo.", $retorno);
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al agregar la multa.", $e);
        }
    }

    function selectMultasBySocioId($id) {
        try {
            $retorno = MultaQuery::create()->findBySocioId($id);

            if(NULL !== $retorno) {
                return $this->success("Informacion encontrada", $retorno);
            } else {
                return $this->warning("No existen multas para este socio");
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al obtenre multas para el id de socio $id.", $e);
        }
    }

}

?>
