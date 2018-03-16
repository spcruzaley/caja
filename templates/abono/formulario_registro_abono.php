<!-- Content -->
<!-- <div id="formulario_registro_abono">
<form action="registrar" method="post">
    Socios:&nbsp;<?php //HTMLGenerator::generateSelectWithSocios($socios);  ?><br />
    Ahorros:&nbsp;<?php //HTMLGenerator::generateSelectWithPrestamos($prestamos);  ?><br />
    Capital:&nbsp;<input type="text" name="capital" id="capital"><br />
    Interes:&nbsp;<input type="text" name="interes" id="interes"><br />
    Comentario:&nbsp;<textarea name="comentario" id="comentario"></textarea><br /><br />
    <input type="submit" /><br />
</form>
</div> -->
<!-- End Content -->
<form id="formulario_registro_abono" action="registrar" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-<?php _e(isset($status)?$status:""); ?>" role="alert" id="messageResult">
                <?php _e(isset($message)?$message:""); ?>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Registrar Abono</strong>
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
                    <div class="card-body">
                        <select name="prestamoId" id="prestamoId" class="form-control-sm form-control">
                        </select>
                    </div>
                    <div class="form-group" id="tipoAbono">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input id="tipoAbono" name="tipoAbono" value="capital" class="form-check-input" type="radio">A Capital
                            </label>
                        </div>
                        <div class="form-check-inline form-check">
                            <label for="inline-radio2" class="form-check-label ">
                                <input id="tipoAbono" name="tipoAbono" value="interes" class="form-check-input" type="radio">A Interes
                            </label>
                        </div>
                    </div>
                    <div id="divCantidadCapital" class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" name="capital" id="capital" placeholder="$ Cantidad...">
                        </div>
                    </div>
                    <div id="divCantidadInteres" class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" name="interes" id="interes" disabled>
                        </div>
                    </div>
                    <div id="divComentario" class="form-group">
                        <label class=" form-control-label">Comentario</label>
                        <div class="input-group">
                            <textarea cols="70" rows="5" name="comentario" id="comentario"></textarea>
                        </div>
                    </div>
                    <div id="divButton" class="form-group">
                        <br />
                        <input type="button" class="btn btn-outline-success btn-lg btn-block" id="botonRegistra" value="Registrar Ahorro" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Content -->
