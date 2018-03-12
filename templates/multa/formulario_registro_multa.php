<!-- Content -->
<div id="formulario_registro_multa">
<form action="registrar" method="post">
    Socios:&nbsp;<?php HTMLGenerator::generateSelectWithSocios($socios);  ?><br />
    Ahorros:&nbsp;<?php HTMLGenerator::generateSelectWithAhorros($ahorros);  ?><br />
    Cantidad:&nbsp;<input type="text" name="cantidad" id="cantidad"><br />
    Comentario:&nbsp;<textarea name="comentario" id="comentario"></textarea><br /><br />
    <input type="submit" /><br />
</form>
</div>
<!-- End Content -->
