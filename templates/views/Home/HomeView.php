<?php require INCLUDES.'header.php'; ?>
		<header>
            <div class="container">
                <nav>
                    <input type="checkbox" id="nav-toggle">

                    <a href="<?php echo URL; ?>">
                        <img src="<?php echo IMAGES; ?>/logo-bg-solid.png" alt="Dish Matamoros">
                    </a>

                    <ul>
                        <li>
                            <a href="#inicio">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="#servicios">
                                Servicios
                            </a>
                        </li>
                        <li>
                            <a href="#paquetes">
                                Paquetes
                            </a>
                        </li>
                        <li>
                            <a href="#contacto">
                                Contacto
                            </a>
                        </li>
                    </ul>

                    <label for="nav-toggle" class="icon-burger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </label>
                </nav>
            </div>
        </header>

        <section id="content">
            <section id="inicio">
                <div class="container">
                    <div class="inicio-text">
                        <h1>Venta, instalación y servicio</h1>
                        <p>Tenemos más de 10 años de experiencia vendiendo e instalando el servicio de televisión satelital y demás productos de Dish en la ciudad de Matamoros Tamaulipas y sus alrededores, garantizamos un servicio de calidad en la atención e instalación el mismo día.</p>
                        <a href="#paquetes" class="btn btn-outline-light">Conoce los paquetes</a>
                    </div>

                    <div class="inicio-form card shadow">
                        <div class="card-header">
                            <h2>Solicita más información</h2>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu nombre" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Ingresa tu teléfono (10 dígitos)" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu correo electrónico" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Escribe tu mensaje"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-danger">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section id="servicios">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center">Somos un distribuidor autorizado para vender e instalar cualquiera de los</p>
                            <h2 class="text-center">Servicios que Dish tiene para ti</h2>
                        </div>
                    </div>

                    <div class="row servicios__grid_a">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3>Televisión</h3>
                                <h4>Satelital</h4>
                                <img src="<?php echo IMAGES; ?>/dish_logo.png" alt="Dish Tv">
                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-body">
                                <h3>Internet</h3>
                                <h4>Inalámbrico</h4>
                                <img src="<?php echo IMAGES; ?>/ON_logo.png" alt="Dish Tv">
                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-body">
                                <h3>Telefonía</h3>
                                <h4>Celular</h4>
                                <img src="<?php echo IMAGES; ?>/FreedomPOP_logo.png" alt="Dish Tv">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="paquetes">
                <h1>Paquetes</h1>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem, facilis fuga illum nesciunt tempora! Alias dignissimos, eaque eum eveniet hic labore laborum magni odio quae quibusdam, quo repellendus sit.</span><span>Cum dolorem doloribus earum incidunt ipsum, laboriosam, libero molestias nisi porro provident repellat sequi vel voluptas. Ab aliquid amet inventore iure maxime minus odio, placeat quaerat repellat sed voluptatibus voluptatum.</span><span>Ab blanditiis cum dignissimos eos esse excepturi ipsam molestias numquam, placeat, quis quos ut veniam. Ad commodi dicta earum esse, facere fugit harum illum magni maiores odio officiis, unde veniam?</span><span>Adipisci deserunt dolorem doloribus provident quia tempora tenetur. Accusamus aliquid, aperiam autem cum dignissimos eaque ex illum libero magnam maxime molestias nemo nulla pariatur, placeat provident, quis tempora vel voluptatibus.</span><span>Ab aliquam, amet cum distinctio dolor dolores eaque eveniet facere facilis fuga illo incidunt itaque iure libero magnam minus non odio, quaerat quibusdam recusandae repudiandae, totam ullam vitae voluptates voluptatibus.</span></p>
            </section>

            <hr>

            <section id="contacto">
                <h1>Contacto</h1>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem, facilis fuga illum nesciunt tempora! Alias dignissimos, eaque eum eveniet hic labore laborum magni odio quae quibusdam, quo repellendus sit.</span><span>Cum dolorem doloribus earum incidunt ipsum, laboriosam, libero molestias nisi porro provident repellat sequi vel voluptas. Ab aliquid amet inventore iure maxime minus odio, placeat quaerat repellat sed voluptatibus voluptatum.</span><span>Ab blanditiis cum dignissimos eos esse excepturi ipsam molestias numquam, placeat, quis quos ut veniam. Ad commodi dicta earum esse, facere fugit harum illum magni maiores odio officiis, unde veniam?</span><span>Adipisci deserunt dolorem doloribus provident quia tempora tenetur. Accusamus aliquid, aperiam autem cum dignissimos eaque ex illum libero magnam maxime molestias nemo nulla pariatur, placeat provident, quis tempora vel voluptatibus.</span><span>Ab aliquam, amet cum distinctio dolor dolores eaque eveniet facere facilis fuga illo incidunt itaque iure libero magnam minus non odio, quaerat quibusdam recusandae repudiandae, totam ullam vitae voluptates voluptatibus.</span></p>
            </section>

            <footer>
            </footer>

        </section>
<?php require INCLUDES.'footer.php'; ?>