<form id="formulario_registro_ahorro" action="registrar" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-<?php _e(isset($status)?$status:""); ?>" role="alert" id="messageResult">
                <?php _e(isset($message)?$message:""); ?>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Registrar Ahorro</strong>
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
                    <div id="divCheckbox" class="form-group">
                        <label>Semana actual?&nbsp;&nbsp;</label>
                        <label class="switch switch-3d switch-primary mr-3">
                            <input class="switch-input" checked="true" type="checkbox" name="checkSemanaActual" id="checkSemanaActual">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div id="divSemana" class="form-group">
                        <label class=" form-control-label">Semana</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="semana" id="semana" disabled>
                        </div>
                    </div>
                    <div id="divSemanas" class="form-group">
                        <label class=" form-control-label">Semanas</label>
                        <div class="input-group">
                            <?php for($i=0;$i<4;$i++): ?>
                                <div class="form-check-inline form-check">
                                <?php for($j=1;$j<=10;$j++): $cont = $j+($i*10) ?>
                                    <label for="inline-checkbox" class="form-check-label col">
                                        <?php _e($cont); ?>
                                        <input id="checkSemana<?php _e($cont); ?>" name="checkSemana<?php _e($cont); ?>" class="form-check-input" type="checkbox">
                                    </label>
                                <?php endfor; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div id="divCantidad" class="form-group">
                        <label class=" form-control-label">Cantidad</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="cantidad" id="cantidad" value="100" disabled>
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
