<div class="row">
    <div class="col-md-6 offset-md-3">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                        <a href="#">
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="/images/avatar.png">
                        </a>
                        <div class="media-body">
                            <h2 class="text-light display-6"><?php _e($socio->getNombre()); ?></h2><p></p>
                            <p><mark>Ahorro <?php _e(Utils::moneyFormatter($socio->getCantidad())); ?></mark></p>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Ahorro Total <span class="badge badge-light pull-right">
                            <?php
                            if (is_array($ahorros)) {
                                _e(Utils::moneyFormatter(0));
                            } else {
                                _e(
                                    Utils::moneyFormatter(count($ahorros->toArray()) * $socio->getCantidad())
                                );
                            }
                            ?></span>
                    </li>
                    <li class="list-group-item">
                        Ahorro Atrasado <span class="badge badge-light pull-right">
                            <?php
                            if (is_array($ahorros)) {
                                _e(Utils::moneyFormatter(0));
                            } else {
                                _e(
                                    Utils::moneyFormatter(
                                        (Utils::getCurrentWeek()-count($ahorros->toArray())) * $socio->getCantidad()
                                    )
                                );
                            }
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">
                        Prestamos Totales <span class="badge badge-light pull-right">
                            <?php
                                $prestamosTotales = 0;
                                foreach ($prestamos as $key => $value) {
                                    $prestamosTotales += $value->getCantidad();
                                }
                                _e(Utils::moneyFormatter($prestamosTotales));
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">
                        Adeudo Total en Prestamos <span class="badge badge-light pull-right">
                            <?php
                                $abonosTotales = 0;
                                foreach ($abonos as $key => $value) {
                                    $abonosTotales += $value->getCapital();
                                }
                                _e(Utils::moneyFormatter($prestamosTotales-$abonosTotales));
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">
                        Interes Atrasado <span class="badge badge-light pull-right">
                            <?php
                                $interesAtrasado = 0;
                                foreach ($prestamos as $key => $prestamo) {
                                    $mesesTranscurridos = Utils::getMonthsFromdate($prestamo->getCreatedAt()->format("d-m-Y"));

                                    foreach ($abonos as $key => $abono) {
                                        $numAbonos = 0;
                                        if($abono->getPrestamoId() == $prestamo->getId() && $abono->getCapital() != 0) {
                                            $numAbonos += 1;
                                        }
                                    }
                                    $mesesTranscurridos -= $numAbonos;
                                    if($mesesTranscurridos > 0) {
                                        $interes = ($prestamo->getCantidad() * ($prestamo->getInteres()/100));
                                        // _e(Utils::moneyFormatter($interes*$mesesTranscurridos));
                                        $interesAtrasado += ($interes*$mesesTranscurridos);
                                    }
                                }
                                _e(Utils::moneyFormatter($interesAtrasado));
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">
                        Multas Totales Generadas <span class="badge badge-light pull-right">
                            <?php
                                $multasTotales = 0;
                                foreach ($multas as $key => $value) {
                                    $multasTotales += $value->getCantidad();
                                }
                                _e(Utils::moneyFormatter($multasTotales));
                            ?>
                        </span>
                    </li>
                </ul>
            </section>
        </aside>
    </div>
</div>

<div class="row">
    <!-- Ahorros -->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Ahorros</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Semana</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Ahorro</th>
                            <th scope="col">Acumulado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $current = 0;
                        foreach ($ahorros as $key => $ahorro) {
                            $current += $socio->getCantidad();
                        ?>
                            <tr>
                                <th scope="row"><?php _e($ahorro->getSemana()); ?></th>
                                <td><?php _e($ahorro->getCreatedAt()->format("d-m-Y")); ?></td>
                                <td><?php _e(Utils::moneyFormatter($socio->getCantidad())); ?></td>
                                <td><?php _e(Utils::moneyFormatter($current)); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Multas -->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Multas</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Semana</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Concepto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $current = 0;
                        foreach ($multas as $key => $multa) {
                        ?>
                            <tr>
                                <th scope="row"><?php _e(Utils::getWeekFromdate($multa->getCreatedAt()->format("d-m-Y"))); ?></th>
                                <td><?php _e($multa->getCreatedAt()->format("d-m-Y")); ?></td>
                                <td><?php _e(Utils::moneyFormatter($multa->getCantidad())); ?></td>
                                <td><?php _e($multa->getComentario()); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Prestamos -->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Prestamos</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Adeudo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($prestamos as $key => $prestamo) {
                            $abonoPrestamo = 0;
                        ?>
                            <tr>
                                <th scope="row"><?php _e($prestamo->getId()); ?></th>
                                <td><?php _e($prestamo->getCreatedAt()->format("d-m-Y")); ?></td>
                                <td><?php _e(Utils::moneyFormatter($prestamo->getCantidad())); ?></td>
                                <?php
                                    foreach ($abonos as $key => $abono):
                                        if ($abono->getPrestamoId() == $prestamo->getId()):
                                            $abonoPrestamo += $abono->getCapital();
                                        endif;
                                    endforeach;
                                ?>
                                <td><?php _e(Utils::moneyFormatter($prestamo->getCantidad() - $abonoPrestamo)); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Abonos -->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Abonos</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"># Prestamo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Capital</th>
                            <th scope="col">Interes</th>
                            <th scope="col">Concepto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $current = 0;
                        foreach ($abonos as $key => $abono) {
                        ?>
                            <tr>
                                <th scope="row"><?php _e($abono->getPrestamoId()); ?></th>
                                <td><?php _e($abono->getCreatedAt()->format("d-m-Y")); ?></td>
                                <td><?php _e(Utils::moneyFormatter($abono->getCapital())); ?></td>
                                <td><?php _e(Utils::moneyFormatter($abono->getInteres())); ?></td>
                                <td><?php _e($abono->getComentario()); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
