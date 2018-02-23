<?php

?>
<div id="formulario_registro_prestamo">
<form action="registrar" method="post">
    <?php HTMLGenerator::generateSelectWithSocios($socios);  ?><br />
    Cantidad:&nbsp;<input type="text" name="cantidad" id="cantidad"><br />
    Interes:&nbsp;<input type="text" name="interes" id="interes" value="10"><br />
    Comentario:&nbsp;<textarea name="comentario" id="comentario"></textarea><br /><br />
    <input type="submit" /><br />
</form>
</div>
