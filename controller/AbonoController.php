<?php

require 'Controller.php';

class AbonoController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function insertAbono($data) {
        try {
            $abono = new Abono();
            $abono->setSocioId($data['socioId']);
            $abono->setPrestamoId($data['prestamoId']);
            $abono->setCapital($data['capital']);
            $abono->setInteres($data['interes']);
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

    function selectAbonosByPrestamoId($id) {
        try {
            $retorno = AbonoQuery::create()->findByPrestamoId($id);

            if(NULL !== $retorno) {
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
