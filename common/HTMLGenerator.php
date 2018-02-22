<?php

require 'HTML.php';

class HTMLGenerator {

    public function generateSelectWithSocios($params, $socios) {
        HTML::getSelectHead($params);
        foreach ($socios as $key => $socio) {
            echo "<option value='".$socio->getId()."'>".$socio->getNombre()."</option>\n";
        }
        HTML::getSelectFoot();
    }

    public function generateSelectWithAhorros($params, $ahorros) {
        HTML::getSelectHead($params);
        foreach ($ahorros as $key => $ahorro) {
            echo "<option value='".$ahorro->getId()."'>".$ahorro->getSocioId()."</option>\n";
        }
        HTML::getSelectFoot();
    }

}

?>
