<?php require INCLUDES.'header.php'; ?>
    <!-- sidebar -->
<?php require INCLUDES.'sidebar.php'; ?>

    <!-- área de trabajo -->
    <section class="close work-section">
        <div class="work-header">
            <i class='fas fa-bars fa-2x' ></i>
            <span class="text">Mensajes</span>
        </div>

        <div class="work-body">
            <form id="form-mensajes" action="<?php echo URL; ?>mensajes/update" method="post">
                <input type="hidden" id="api" value="<?php echo URL; ?>mensajes/api">
                <div class="container-table">
                    <table>
                        <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Telefono
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Mensaje
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Revisado
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-secondary">Guardar mensajes leídos</button>
            </form>
        </div>
    </section>
<?php require INCLUDES.'footer.php'; ?>