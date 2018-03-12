<!-- Content -->
<form action="registrar" method="post">
    <div class="row" id="formulario_registro_socio">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-<?php _e(isset($status)?$status:""); ?>" role="alert">
                <?php _e(isset($message)?$message:""); ?>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong>Registrar Socio</strong>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label class=" form-control-label">Nombre</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del socio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Telefono</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="5511223344">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Correo</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input class="form-control" type="email" name="correo" id="correo" placeholder="correo@servidor.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Cantidad</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                            <input class="form-control" type="number" name="cantidad" id="cantidad" value="100">
                        </div>
                        <small class="form-text text-muted">Cantidad del ahorro</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="Registrar Socio" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Content -->
