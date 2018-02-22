<?php

$paramSocios = array('data-placeholder' => "Selecciona socio...",
                'class' => "standardSelect",
                'tabindex' => "1",
                'name' => "socioId",
                'id' => "socioId");

$paramAhorros = array('data-placeholder' => "Selecciona ahorro...",
                'class' => "standardSelect",
                'tabindex' => "1",
                'name' => "ahorroId",
                'id' => "ahorroId");

?>
<div id="formulario_registro_multa">
<form action="registrar" method="post">
    Socios:&nbsp;<?php HTMLGenerator::generateSelectWithSocios($paramSocios, $socios);  ?><br />
    Ahorros:&nbsp;<?php HTMLGenerator::generateSelectWithAhorros($paramAhorros, $ahorros);  ?><br />
    Cantidad:&nbsp;<input type="text" name="cantidad" id="cantidad"><br />
    Comentario:&nbsp;<textarea name="comentario" id="comentario"></textarea><br /><br />
    <input type="submit" /><br />
</form>
</div>
