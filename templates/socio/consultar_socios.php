<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Cantidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($socios)) {
                                    foreach ($socios as $key => $socio) {
                                    ?>
                                        <tr>
                                            <td><a href="/socio.php/consultar/<?php _e($socio->getId()); ?>"><?php _e($socio->getNombre()); ?></a></td>
                                            <td><?php _e($socio->getTelefono()); ?></td>
                                            <td><?php _e($socio->getCorreo()); ?></td>
                                            <td><?php _e(Utils::moneyFormatter($socio->getCantidad())); ?></td>
                                            <td><?php _e(($socio->getActivo() == 1)?"Activo":"Inactivo"); ?></td>
                                        </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
