<?php require INCLUDES.'header.php'; ?>
    <!-- sidebar -->
<?php require INCLUDES.'sidebar.php'; ?>

    <!-- área de trabajo -->
    <section class="close work-section">
        <div class="work-header">
            <i class='fas fa-bars fa-2x' ></i>
            <span class="text">Edición de empleado</span>
        </div>

        <div class="work-body">
            <?php
            if (!is_array($data))
            {
                ?>
                <h4>No se encontró información del id de empleado.</h4>
                <?php
            }
            else
            {
                ?>
                <h4>Modifique los datos del empleado y de clic en 'Guardar'</h4>
                <!--
                    FORMULARIO PARA EL REGISTRO DE EMPLEADOS
                -->
                <form action="/empleados/update" method="post" onsubmit="return evalForm(event, this)">
                    <?php
                    include_once INCLUDES.'Empleados/FormEmpleados.php';
                    ?>
                    <br>

                    <div class="row">
                        <div class="col-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-block btn-secondary">Guardar</button>
                        </div>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
    </section>
<?php require INCLUDES.'footer.php'; ?>