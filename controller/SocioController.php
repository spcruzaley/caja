<?php

require_once 'Controller.php';

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

    function updateSocio($data) {
        try {
            $socio = SocioQuery::create()->findPk($data['socioId']);
            $socio->setNombre($data['nombre']);
            $socio->setTelefono($data['telefono']);
            $socio->setCorreo($data['correo']);
            $socio->setCantidad($data['cantidad']);
            $retorno = $socio->save();

            if($retorno > 0) {
                return $this->success("El socio se ha actualizado de manera correcta");
            } else {
                return $this->warning("El socio no se actualizo, vuelva a intentarlo.", $retorno);
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al actualizar el socio.", $e);
        }
    }

    function disableSocio($id) {
        try {
            $socio = SocioQuery::create()->findPk($id);

            if(NULL !== $socio) {
                $socio->setActivo(0);
                $retorno = $socio->save();

                if($retorno > 0) {
                    return $this->success("El socio se ha desactivado de manera correcta");
                } else {
                    return $this->warning("El socio no se desactivo, vuelva a intentarlo.", $retorno);
                }
            } else {
                return $this->warning("El socio no existe.");
            }
        } catch(Exception $e) {
            return $this->error("Ocurrio un error al desactivar al socio.", $e);
        }
    }

    // function deleteSocio($id) {
    //     try {
    //         $socio = SocioQuery::create()->findPk($id);
    //         $hasAhorros = $this->hasAhorros($socio);
    //         $hasMultas = $this->hasMultas($socio);
    //         $hasPrestamos = $this->hasPrestamos($socio);
    //         $hasAbonos = $this->hasAbonos($socio);
    //
    //         if($hasAhorros) {
    //
    //         }
    //
    //         if(NULL !== $socio) {
    //             $socio->delete();
    //             if($socio->isDeleted()) {
    //                 return $this->success("El socio se ha eliminado de manera correcta");
    //             } else {
    //                 return $this->warning("El socio no se elimino, vuelva a intentarlo.", $retorno);
    //             }
    //         } else {
    //             return $this->warning("El socio no existe.");
    //         }
    //
    //     } catch(Exception $e) {
    //         return $this->error("Ocurrio un error al eliminar el socio.", $e);
    //     }
    // }

}

?>
