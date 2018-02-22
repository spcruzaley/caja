<?php

require 'Controller.php';

class SocioController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function insertSocio($data) {
        try {
            $socio = new Socio();
            $socio->setNombre($data['nombre']);
            $socio->setTelefono($data['telefono']);
            $socio->setCorreo($data['correo']);
            $socio->setCantidad($data['cantidad']);
            $retorno = $socio->save();

            if($retorno > 0) {
                return $this->success("El socio se ha registrado de manera correcta");
            } else {
                return $this->warning("El socio no se registro, vuelva a intentarlo.", $retorno);
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al insertar el socio.", $e);
        }
    }

    function selectSocio($id) {
        try {
            $socio = SocioQuery::create()->findPk($id);

            if(NULL !== $socio) {
                return $this->success("Socio localizado", $socio);
            } else {
                return $this->warning("El socio no se encuentra registrado.");
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al buscar el socio $id.", $e);
        }
    }

}

?>
