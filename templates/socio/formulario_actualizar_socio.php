<!-- Content -->
<div id="formulario_actualizar_socio">
<form action="/socio.php/actualizar" method="post">
    SocioID (Campo hidden):&nbsp;<input type="text" name="socioId" id="socioId" value="<?php _e($socio->getId()); ?>"><br />
    Nombre:&nbsp;<input type="text" name="nombre" id="nombre" value="<?php _e($socio->getNombre()); ?>"><br />
    Telefono:&nbsp;<input type="text" name="telefono" id="telefono" value="<?php _e($socio->getTelefono()); ?>"><br />
    Corregenerated-classeso:&nbsp;<input type="email" name="correo" id="correo" value="<?php _e($socio->getCorreo()); ?>"><br />
    Cantidad:&nbsp;<input type="number" name="cantidad" id="cantidad" value="<?php _e($socio->getCantidad()); ?>"><br /><br />
    <input type="submit" /><br />
</form>
</div>
<!-- End Content -->
