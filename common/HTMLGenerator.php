<?php

use \HtmlGenerator\HtmlTag as HtmlTag;

class HTMLGenerator {

    public function generateSelectWithSocios($params, $socios) {
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

    public function generateSelectWithAhorros($params, $ahorros) {
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

}

?>
