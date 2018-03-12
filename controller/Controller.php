<?php

require_once '../CajaLoader.php';

class Controller {

    private $socios;
    private $ahorros;
    private $prestamos;
    private $multas;
    private $abonos;
    public $log;

    function __construct() {
        global $log;
        $this->log = $log;

        $this->socios = $this->setData(new SocioQuery());
        $this->ahorros = $this->setData(new AhorroQuery());
        $this->prestamos = $this->setData(new PrestamoQuery());
        $this->multas = $this->setData(new MultaQuery());
        $this->abonos = $this->setData(new AbonoQuery());
    }

    private function setData($obj) {
        return $obj->create()->find();
    }

    public function getSocios() {
        return $this->socios;
    }
    public function getAhorros() {
        return $this->ahorros;
    }
    public function getPrestamos() {
        return $this->prestamos;
    }
    public function getMultas() {
        return $this->multas;
    }
    public function getAbonos() {
        return $this->abonos;
    }

    //////////////
    public function success($msg, $data="") {
        return array('status' => 'success', 'message' => $msg, 'data' => $data);
    }
    public function warning($msg, $return="") {
        $this->log->warning("[$msg] ".$return);
        return array('status' => 'warning', 'message' => $msg." -- ".$return, 'data' => []);
    }
    public function error($msg, $e) {
        $this->log->error("[$msg] ".((NULL !== $e)?($e->getMessage()):""));
        return array('status' => 'danger', 'message' => $msg." -- ".((NULL !== $e)?($e->getMessage()):""), 'data' => []);
    }

    //////////////
    public function hasAhorros($socio) {
        return (count($socio->getAhorros()) > 0)?true:false;
    }
    public function hasMultas($socio) {
        return (count($socio->getMultas()) > 0)?true:false;
    }
    public function hasPrestamos($socio) {
        return (count($socio->getPrestamos()) > 0)?true:false;
    }
    public function hasAbonos($socio) {
        return (count($socio->getAbonos()) > 0)?true:false;
    }

    public function hasElements($object) {
        if($object['status'] === "success") {
            return true;
        } else {
            return false;
        }
    }

}

?>
