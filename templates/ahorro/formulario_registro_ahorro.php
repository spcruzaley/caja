<?php

?>
<div id="formulario_registro_ahorro">
<form action="registrar" method="post">
    <?php HTMLGenerator::generateSelectWithSocios($socios);  ?><br />
    Semana:&nbsp;<input type="text" name="semana" id="semana"><br /><br />
    <input type="submit" /><br />
</form>
</div>
