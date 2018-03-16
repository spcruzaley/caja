<!-- End Content -->
<form id="formulario_registro_prestamo" action="registrar" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-<?php _e(isset($status)?$status:""); ?>" role="alert" id="messageResult">
                <?php _e(isset($message)?$message:""); ?>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Registrar Prestamo</strong>
                </div>
                <div class="card-body card-block">
                    <div class="card-body">
                        <select data-placeholder="Seleccionar socio..." class="standardSelect" tabindex="1"
                            name="socioId" id="socioId">
                            <option value=""></option>
                            <?php foreach ($socios as $key => $socio): ?>
                                <option value="<?php _e($socio->getId()); ?>"><?php _e($socio->getNombre()); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div id="divCantidad" class="form-group">
                        <label class=" form-control-label">Cantidad</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="cantidad" id="cantidad" placeholder="$ Cantidad a prestar">
                        </div>
                    </div>
                    <div id="divCantidad" class="form-group">
                        <label class=" form-control-label">Interes</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="interes" id="interes" value="10">
                        </div>
                    </div>
                    <div id="divCantidad" class="form-group">
                        <label class=" form-control-label">Comentario</label>
                        <div class="input-group">
                            <textarea cols="70" rows="5" name="comentario" id="comentario"></textarea>
                        </div>
                    </div>
                    <div id="divButton" class="form-group">
                        <br />
                        <input type="button" class="btn btn-outline-success btn-lg btn-block" id="botonRegistra" value="Registrar Prestamo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Content -->
