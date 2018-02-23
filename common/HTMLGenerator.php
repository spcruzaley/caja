<?php

use \HtmlGenerator\HtmlTag as HtmlTag;

class HTMLGenerator {

    public function generateSelectWithSocios($socios) {
        $params = array('data-placeholder' => "Selecciona socio...",
                        'class' => "standardSelect",
                        'tabindex' => "1",
                        'name' => "socioId",
                        'id' => "socioId");

        $tag = HtmlTag::createElement('select')
                        ->addCustomParams($params)
                        ->addElement('option');

        foreach ($socios as $key => $socio) {
            $tag->getParent()
            ->addElement('option')
            ->addCustomParam('value',$socio->getId())
            ->text($socio->getNombre());
        }

        _e($tag);
    }

    public function generateSelectWithAhorros($ahorros) {
        $params = array('data-placeholder' => "Selecciona ahorro...",
                        'class' => "standardSelect",
                        'tabindex' => "1",
                        'name' => "ahorroId",
                        'id' => "ahorroId");

        $tag = HtmlTag::createElement('select')
                        ->addCustomParams($params)
                        ->addElement('option');

        foreach ($ahorros as $key => $ahorro) {
            $tag->getParent()
            ->addElement('option')
            ->addCustomParam('value',$ahorro->getId())
            ->text($ahorro->getSocioId());
        }

        _e($tag);
    }

    public function generateSelectWithPrestamos($prestamos) {
        $params = array('data-placeholder' => "Selecciona prestamo...",
                        'class' => "standardSelect",
                        'tabindex' => "1",
                        'name' => "prestamoId",
                        'id' => "prestamoId");

        $tag = HtmlTag::createElement('select')
                        ->addCustomParams($params)
                        ->addElement('option');

        foreach ($prestamos as $key => $prestamo) {
            $tag->getParent()
            ->addElement('option')
            ->addCustomParam('value',$prestamo->getId())
            ->text($prestamo->getSocioId());
        }

        _e($tag);
    }

}

?>
