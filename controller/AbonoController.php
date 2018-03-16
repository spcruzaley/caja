<?php

require_once 'Controller.php';

class AbonoController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function insertAbono($data) {
        try {
            $abono = new Abono();
            $abono->setSocioId($data['socioId']);
            $abono->setPrestamoId($data['prestamoId']);
            $abono->setCapital(isset($data['capital'])?$data['capital']:0);
            $abono->setInteres(isset($data['interes'])?$data['interes']:0);
            $abono->setComentario($data['comentario']);
            $retorno = $abono->save();

            if($retorno > 0) {
                return $this->success("El abono se ha registrado de manera correcta");
            } else {
                return $this->warning("El abono no se registro, vuelva a intentarlo.", $retorno);
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al agregar la abono.", $e);
        }
    }

    function selectAbonosBySocioId($id) {
        try {
            $retorno = AbonoQuery::create()->findBySocioId($id);

            if(NULL !== $retorno && count($retorno) > 0) {
                return $this->success("Informacion encontrada", $retorno);
            } else {
                return $this->warning("No existen abonos para este socio");
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al obtener abonos para el id de socio $id.", $e);
        }
    }

    function selectAbonosByPrestamoId($id) {
        try {
            $retorno = AbonoQuery::create()->findByPrestamoId($id);

            if(NULL !== $retorno && count($retorno) > 0) {
                return $this->success("Informacion encontrada", $retorno);
            } else {
                return $this->warning("No existen abonos para este prestamo");
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al obtenre abonos para el id de prestamo $id.", $e);
        }
    }

}

?>
