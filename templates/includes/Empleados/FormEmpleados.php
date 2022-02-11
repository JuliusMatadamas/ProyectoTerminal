<?php
if (count($data) == 0)
{
    $id = '';
    $nombre = '';
    $apellido_paterno = '';
    $apellido_materno = '';
    $fecha_nacimiento = '';
    $sexo = '0';
    $codigo_postal = '';
    $estado = '';
    $municipio = '';
    $asentamiento_id = 0;
    $domicilio = '';
    $email = '';
    $telefono = '';
}
else
{
    $id = $data[0]["id"];
    $nombre = $data[0]["nombre"];
    $apellido_paterno = $data[0]["apellido_paterno"];
    $apellido_materno = $data[0]["apellido_materno"];
    $fecha_nacimiento = $data[0]["fecha_nacimiento"];
    $sexo = $data[0]["sexo"];
    $codigo_postal = $data[0]["codigo_postal"];
    $estado = $data[0]["estado"];
    $municipio = $data[0]["municipio"];
    $asentamiento_id =$data[0]["asentamiento_id"];
    $domicilio = $data[0]["domicilio"];
    $email = $data[0]["email"];
    $telefono = $data[0]["telefono"];
}
?><div class="row">
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="nombre">Nombre</label>
        <input
                type="text"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="nombre" id="nombre"
                value="<?php echo $nombre; ?>">
        <div id="nombre-feedback" class="feedback">
        </div>
    </div>

    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="apellido_paterno">Apellido paterno</label>
        <input
                type="text"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="apellido_paterno"
                id="apellido_paterno"
                value="<?php echo $apellido_paterno; ?>">
        <div id="apellido_paterno-feedback" class="feedback">
        </div>
    </div>

    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="apellido_materno">Apellido materno</label>
        <input
                type="text"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="apellido_materno"
                id="apellido_materno"
                value="<?php echo $apellido_materno; ?>">
        <div id="apellido_materno-feedback" class="feedback">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input
                type="date"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="fecha_nacimiento"
                id="fecha_nacimiento"
                value="<?php echo $fecha_nacimiento; ?>">
        <div id="fecha_nacimiento-feedback" class="feedback">
        </div>
    </div>

    <div class="col-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <label for="sexo">Sexo</label>
        <select class="form-control" name="sexo" id="sexo">
            <option value="0" <?php echo $sexo == '0'? 'selected' : ''; ?>>Seleccione...</option>
            <option value="M" <?php echo $sexo == 'M'? 'selected' : ''; ?>>Masculino</option>
            <option value="F" <?php echo $sexo == 'F'? 'selected' : ''; ?>>Femenino</option>
        </select>
        <div id="sexo-feedback" class="feedback">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <label for="codigo_postal">Ingrese el código postal</label>
        <input
                type="text"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                maxlength="5"
                id="codigo_postal"
                value="<?php echo $codigo_postal; ?>">
        <div id="codigo_postal-feedback" class="feedback">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="estado">Estado</label>
        <input
                type="text"
                class="form-control"
                disabled
                id="estado"
                value="<?php echo $estado; ?>">
        <div id="estado-feedback" class="feedback">
        </div>
    </div>

    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="municipio">Municipio</label>
        <input
                type="text"
                class="form-control"
                disabled
                id="municipio"
                value="<?php echo $municipio; ?>">
        <div id="municipio-feedback" class="feedback">
        </div>
    </div>

    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="asentamiento_id">Seleccione el asentamiento</label>
        <select class="form-control" name="asentamienti_id" id="asentamiento_id">
            <option value="0" <?php echo $asentamiento_id == 0 ? 'selected' : ''; ?>>Seleccione...</option>
            <?php
            if ($asentamiento_id !== 0)
            {
                $sql = "SELECT asentamientos.id, asentamientos.nombre FROM asentamientos WHERE asentamientos.codigo_postal_id = (SELECT asentamientos.codigo_postal_id  FROM asentamientos WHERE asentamientos.id = $asentamiento_id)";
                $asentamientos = Db::query($sql);

                foreach ($asentamientos as $asentamiento)
                {
                    echo '<option value="';
                    echo $asentamiento["id"];
                    echo '" ';
                    echo $asentamiento_id == $asentamiento["id"]? 'selected' : '';
                    echo '>'.$asentamiento["nombre"];
                    echo '</option>';
                }
            }
            ?>
        </select>
        <div id="asentamiento_id-feedback" class="feedback">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <label for="domicilio">Domicilio</label>
        <input
                type="text"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="domicilio"
                id="domicilio"
                value="<?php echo $domicilio; ?>">
        <div id="domicilio-feedback" class="feedback">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="email">Email</label>
        <input
                type="email"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="email"
                id="email"
                value="<?php echo $email; ?>">
        <div id="email-feedback" class="feedback">
        </div>
    </div>

    <div class="col-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <label for="telefono">Teléfono</label>
        <input
                type="text"
                class="form-control"
                onpaste="return false;"
                ondrop="return false;"
                autocomplete="off"
                name="telefono"
                id="telefono"
                value="<?php echo $telefono; ?>">
        <div id="telefono-feedback" class="feedback">
        </div>
    </div>
</div>
