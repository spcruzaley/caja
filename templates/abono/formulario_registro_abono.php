<!-- Content -->
<div id="formulario_registro_abono">
<form action="registrar" method="post">
    Socios:&nbsp;<?php HTMLGenerator::generateSelectWithSocios($socios);  ?><br />
    Ahorros:&nbsp;<?php HTMLGenerator::generateSelectWithPrestamos($prestamos);  ?><br />
    Capital:&nbsp;<input type="text" name="capital" id="capital"><br />
    Interes:&nbsp;<input type="text" name="interes" id="interes"><br />
    Comentario:&nbsp;<textarea name="comentario" id="comentario"></textarea><br /><br />
    <input type="submit" /><br />
</form>
</div>
<!-- End Content -->
