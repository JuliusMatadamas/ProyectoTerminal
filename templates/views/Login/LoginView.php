<?php require INCLUDES.'header.php'; ?>
        <div class="login__container">
            <div class="card shadow">
                <div class="card-header">
                    <img src="<?php echo IMAGES; ?>/logo-bg-transparent-solid.png" alt="Dish Matamoros">
                </div>
                <div class="card-body">
                    <form action="<?php echo URL; ?>auth" method="post">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu usuario">
                                <div class="feedback"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu clave">
                                <div class="feedback"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
                                <div class="feedback"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php require INCLUDES.'footer.php'; ?>