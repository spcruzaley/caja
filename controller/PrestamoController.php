<?php

require 'Controller.php';

class prestamoController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function insertPrestamo($data) {
        try {
            $prestamo = new Prestamo();
            $prestamo->setSocioId($data['socioId']);
            $prestamo->setCantidad($data['cantidad']);
            $prestamo->setInteres($data['interes']);
            $prestamo->setComentario($data['comentario']);
            $retorno = $prestamo->save();

            if($retorno > 0) {
                return $this->success("El prestamo se ha registrado de manera correcta");
            } else {
                return $this->warning("El prestamo no se registro, vuelva a intentarlo.", $retorno);
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al agregar el prestamo.", $e);
        }
    }

}

?>
