<?php

$paramSocios = array('data-placeholder' => "Selecciona socio...",
                'class' => "standardSelect",
                'tabindex' => "1",
                'name' => "socioId",
                'id' => "socioId");

?>
<div id="formulario_registro_ahorro">
<form action="registrar" method="post">
    <?php HTMLGenerator::generateSelectWithSocios($paramSocios, $socios);  ?><br />
    Semana:&nbsp;<input type="text" name="semana" id="semana"><br /><br />
    <input type="submit" /><br />
</form>
</div>
