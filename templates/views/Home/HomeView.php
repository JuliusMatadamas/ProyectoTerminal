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
                            <form id="form-mensaje" method="post" action="<?php echo URL; ?>mensaje">
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
                                        <button type="submit" class="btn btn-block btn-danger">Enviar</button>
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

                    <br>

                    <div class="row servicios__grid_b">
                        <div class="servicios__img">
                            <img src="<?php echo IMAGES; ?>/instalacion.png" alt="Instalamos su equipo">
                        </div>
                        <div class="servicios__text">
                            <h3>Instalamos el mismo día</h3>
                            <p>Cuando se suscriba a DISH con nosotros, montaremos su antena parabólica e instalaremos su sistema decodificador de señal para su tv o pantalla sin cargo por tiempo limitado. Deje que nosotros lo hagamos todo en una sola visita. El día que se acuerde para la instalción nos comunicaremos con usted minutos antes para asegurar su presencia.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="paquetes">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center">AHORA CON TUS PLATAFORMAS FAVORITAS <span>¡A UN PRECIO INCREÍBLE!</span></h4>
                        </div>
                    </div>

                    <div class="row paquetes__grid_a">
                        <div class="paquetes__grid_a-1">
                            <img src="<?php echo IMAGES; ?>/netflix_logo.png" alt="Netflix">
                            <div class="paquetes__grid_a-2">
                                <!--
                                    Paquete Netflix - Dish Junior
                                -->
                                <div class="card shadow">
                                    <img src="<?php echo IMAGES; ?>/netflix_logo.png">

                                    <p class="paquetes__p1">1 PANTALLA SD</p>

                                    <div class="paquetes__d1">
                                        <div class="paquetes__p-junior">
                                            <div>DISH JUNIOR</div>
                                        </div>
                                        <p class="paquetes__p2">$277 DOMICILIADO</p>
                                        <div class="paquetes__d1-g1">
                                            <div>
                                                <p class="paquetes__p3">Por solo</p>
                                                <p class="paquetes__p4">$</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p5">287</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p6">al mes</p>
                                                <p class="paquetes__p7">EFECTIVO</p>
                                            </div>
                                        </div>
                                        <p class="paquetes__p8">INCLUYE</p>
                                        <div class="paquetes__d1-g2">
                                            <div class="paquetes__d1-g2-d1">
                                                <p class="paquetes__p9">HASTA</p>
                                                <P class="paquetes__p10">41 CANALES</P>
                                                <P class="paquetes__p10">&nbsp;</P>
                                            </div>
                                            <div>
                                                <p class="paquetes__p9">&nbsp;</p>
                                                <p class="paquetes__p10">10 AUDIO</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                    Paquete Netflix - Dish Básico
                                -->
                                <div class="card shadow">
                                    <img src="<?php echo IMAGES; ?>/netflix_logo.png">

                                    <p class="paquetes__p1">2 PANTALLAS HD</p>

                                    <div class="paquetes__d1">
                                        <div class="paquetes__p-basico">
                                            <div>DISH BÁSICO</div>
                                        </div>
                                        <p class="paquetes__p2">&nbsp;</p>
                                        <div class="paquetes__d1-g1">
                                            <div>
                                                <p class="paquetes__p3">Por solo</p>
                                                <p class="paquetes__p4">$</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p5">394</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p6">al mes</p>
                                                <p class="paquetes__p7">&nbsp;</p>
                                            </div>
                                        </div>
                                        <p class="paquetes__p8">INCLUYE</p>
                                        <div class="paquetes__d1-g2">
                                            <div class="paquetes__d1-g2-d1">
                                                <p class="paquetes__p9">HASTA</p>
                                                <P class="paquetes__p10">74 CANALES</P>
                                                <P class="paquetes__p10">10 AUDIO</P>
                                            </div>
                                            <div>
                                                <img src="<?php echo IMAGES; ?>/dishmovil.png" alt="Dish Móvil">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paquetes__grid_a-1">
                            <img src="<?php echo IMAGES; ?>/amazon_prime_logo.png" alt="Amazon Prime">
                            <div class="paquetes__grid_a-2">
                                <!--
                                    Paquete Amazon Prime - Dish Básico
                                -->
                                <div class="card shadow">
                                    <img src="<?php echo IMAGES; ?>/amazon_prime_logo.png">

                                    <p class="paquetes__p1">MEMBRESÍA</p>

                                    <div class="paquetes__d1">
                                        <div class="paquetes__p-junior">
                                            <div>DISH JUNIOR</div>
                                        </div>
                                        <p class="paquetes__p2">$235 DOMICILIADO</p>
                                        <div class="paquetes__d1-g1">
                                            <div>
                                                <p class="paquetes__p3">Por solo</p>
                                                <p class="paquetes__p4">$</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p5">245</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p6">al mes</p>
                                                <p class="paquetes__p7">&nbsp;</p>
                                            </div>
                                        </div>
                                        <p class="paquetes__p8">INCLUYE</p>
                                        <div class="paquetes__d1-g2">
                                            <div class="paquetes__d1-g2-d1">
                                                <p class="paquetes__p9">HASTA</p>
                                                <P class="paquetes__p10">41 CANALES</P>
                                                <P class="paquetes__p10">&nbsp;</P>
                                            </div>
                                            <div>
                                                <p class="paquetes__p9">&nbsp;</p>
                                                <p class="paquetes__p10">10 AUDIO</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                    Paquete Amazon Prime - Dish Básico
                                -->
                                <div class="card shadow">
                                    <img src="<?php echo IMAGES; ?>/amazon_prime_logo.png">

                                    <p class="paquetes__p1">MEMBRESÍA</p>

                                    <div class="paquetes__d1">
                                        <div class="paquetes__p-basico">
                                            <div>DISH BÁSICO</div>
                                        </div>
                                        <p class="paquetes__p2">&nbsp;</p>
                                        <div class="paquetes__d1-g1">
                                            <div>
                                                <p class="paquetes__p3">Por solo</p>
                                                <p class="paquetes__p4">$</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p5">286</p>
                                            </div>
                                            <div>
                                                <p class="paquetes__p6">al mes</p>
                                                <p class="paquetes__p7">&nbsp;</p>
                                            </div>
                                        </div>
                                        <p class="paquetes__p8">INCLUYE</p>
                                        <div class="paquetes__d1-g2">
                                            <div class="paquetes__d1-g2-d1">
                                                <p class="paquetes__p9">HASTA</p>
                                                <P class="paquetes__p10">74 CANALES</P>
                                                <P class="paquetes__p10">10 AUDIO</P>
                                            </div>
                                            <div>
                                                <img src="<?php echo IMAGES; ?>/dishmovil.png" alt="Dish Móvil">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row paquetes__grid_b">
                        <div>
                            <div>
                                <div>
                                    <img src="<?php echo IMAGES; ?>/netflix_logo.png">
                                </div>
                                <div>
                                    2 PANTALLA HD
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img src="<?php echo IMAGES; ?>/amazon_prime_logo.png">
                                </div>
                                <div>
                                    MEMBRESÍA
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div>
                                    <div>
                                        Por solo
                                    </div>
                                    <div>
                                        $
                                    </div>
                                </div>

                                <div>
                                    465
                                </div>

                                <div>
                                    al mes
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div>
                                        DISH BÁSICO
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <div>
                                            INCLUYE
                                        </div>

                                        <div>
                                            HASTA
                                        </div>
                                    </div>

                                    <div>
                                        <div>
                                            74 CANALES
                                        </div>

                                        <div>
                                            10 AUDIO
                                        </div>
                                    </div>

                                    <div>
                                        <img src="<?php echo IMAGES; ?>/dishmovil.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PAQUETE DISH JUNIOR -->
                    <div id="dish_junior" class="paquetes__header row">
                        <div>DISH JUNIOR</div>
                        <div>
                            <div>HASTA</div>
                            <div>41 CANALES</div>
                        </div>
                        <div>
                            <div>&nbsp;</div>
                            <div>10 AUDIO</div>
                        </div>
                        <div>$</div>
                        <div>177</div>
                        <div>EN EFECTIVO</div>
                        <div>Por solo</div>
                        <div>$</div>
                        <div>167</div>
                        <div>
                            <div>al mes</div>
                            <div>cargo domiciliado</div>
                        </div>
                    </div>

                    <div id="dish_junior-canales" class="row">
                        <div>
                            <?php
                            for ($i = 0; $i < count($data); $i++)
                            {
                                if ($data[$i]["paquete_id"] == 1)
                                {
                                    if ($data[$i]["type"] == "incluidos")
                                    {
                                        echo "<div><img src='";
                                        echo IMAGES.$data[$i]["path"];
                                        echo "'></div>";
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div>
                            <div>
                                <?php
                                for ($i = 0; $i < count($data); $i++)
                                {
                                    if ($data[$i]["paquete_id"] == 1)
                                    {
                                        if ($data[$i]["type"] == "abierta")
                                        {
                                            echo "<div><img src='";
                                            echo IMAGES.$data[$i]["path"];
                                            echo "'></div>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div>
                                <p>Canales sujetos a disponibilidad en cada localidad de conformidad con la normatividad aplicable, y de acuerdo a la tecnología del sistema digital.</p>
                            </div>
                        </div>
                    </div>

                    <!-- PAQUETE BÁSICO -->
                    <div id="basico" class="paquetes__header row">
                        <div>BÁSICO</div>
                        <div>
                            <div>HASTA</div>
                            <div>74 CANALES</div>
                        </div>
                        <div>
                            <div>&nbsp;</div>
                            <div>10 AUDIO</div>
                        </div>
                        <div></div>
                        <div>INCLUYE</div>
                        <div>JUNIOR</div>
                        <div>Por solo</div>
                        <div>$</div>
                        <div>224</div>
                        <div>
                            <div>al mes</div>
                            <div></div>
                        </div>
                    </div>

                    <div id="dish_basico-canales" class="row">
                        <div>
                            <?php
                            for ($i = 0; $i < count($data); $i++)
                            {
                                if ($data[$i]["paquete_id"] == 2)
                                {
                                    if ($data[$i]["type"] == "incluidos")
                                    {
                                        echo "<div><img src='";
                                        echo IMAGES.$data[$i]["path"];
                                        echo "'></div>";
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div>
                            <div>
                                <img src="<?php echo IMAGES; ?>/dishmovil_dark.png" alt="Dish Móvil">
                            </div>
                            <div>
                                <p>MILES DE CONTENIDOS EN LÍNEA PARA VER DONDE QUIERAS Y CUANDO QUIERAS.</p>
                            </div>
                        </div>
                    </div>

                    <!-- DISH HD -->
                    <div id="dish_hd" class="paquetes__header row">
                        <div>DISH HD</div>
                        <div>
                            <div>HASTA</div>
                            <div>121 CANALES</div>
                        </div>
                        <div>
                            <div>&nbsp;</div>
                            <div>10 AUDIO</div>
                        </div>
                        <div>$</div>
                        <div>528</div>
                        <div>EN EFECTIVO</div>
                        <div>Por solo</div>
                        <div>$</div>
                        <div>474</div>
                        <div>
                            <div>al mes</div>
                            <div>cargo domiciliado</div>
                        </div>
                    </div>
                    <div class="canales_hd-premiun row">
                        <div>
                            <div>INCLUYE</div>
                            <div>MEMBRESÍA</div>
                        </div>
                        <div>
                            <div>
                                <img src="<?php echo IMAGES; ?>/amazon_prime.png" alt="Amazon Prime">
                            </div>
                        </div>
                        <div>
                            <div>INCLUYE</div>
                            <div>PLATAFORMAS</div>
                            <div>DIGITALES</div>
                        </div>
                        <div>
                            <div class="canal-noggin">
                                <img src="<?php echo IMAGES; ?>/noggin.png" alt="Noggin">
                            </div>
                        </div>
                        <div>
                            <div class="canal-paramount">
                                <img src="<?php echo IMAGES; ?>/paramount_plus.png" alt="Paramount Plus">
                            </div>
                        </div>
                        <div>
                            <div>
                                <img src="<?php echo IMAGES; ?>/dishmovil_dark.png" alt="Dish Móvil">
                            </div>
                        </div>
                    </div>

                    <!-- PAQUETES PREMIUN -->
                    <div id="paquetes_premiun" class="row">
                        <div>
                            <div>PAQUETES PREMIUN</div>
                            <div>
                                <div>INCLUYEN</div>
                                <div>BÁSICO</div>
                            </div>
                        </div>
                        <div>
                            <div class="paquetes__header row">
                                <div>PREMIUN DOS</div>
                                <div>
                                    <div>HASTA</div>
                                    <div>84 CANALES</div>
                                </div>
                                <div>
                                    <div>&nbsp;</div>
                                    <div>10 AUDIO</div>
                                </div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div>Por solo</div>
                                <div>$</div>
                                <div>422</div>
                                <div>
                                    <div>al mes</div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="canales_hd-premiun row">
                                <div>
                                    <div>INCLUYE</div>
                                    <div>10 CANALES</div>
                                </div>
                                <div>
                                    <div class="canal-hbo">
                                        <img src="<?php echo IMAGES; ?>/HBO.png" alt="HBO">
                                    </div>
                                </div>
                                <div></div>
                                <div>
                                    <div>ACCESO A LA</div>
                                    <div>PLATAFORMA</div>
                                </div>
                                <div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/HBO_max.png" alt="HBO Max">
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/starzplay_logo.png" alt="Starz Play">
                                    </div>
                                </div>
                            </div>


                            <div class="paquetes__header row">
                                <div>ALL ACCESS HD</div>
                                <div>
                                    <div>HASTA</div>
                                    <div>111 CANALES</div>
                                </div>
                                <div>
                                    <div>&nbsp;</div>
                                    <div>10 AUDIO</div>
                                </div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div>Por solo</div>
                                <div>$</div>
                                <div>610</div>
                                <div>
                                    <div>al mes</div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="canales_hd-premiun row">
                                <div>
                                    <div>INCLUYE</div>
                                </div>
                                <div>
                                    <div class="canales_hd-premiun-1">BÁSICO MÁS</div>
                                </div>
                                <div>
                                    <div class="canales_hd-premiun-2">PREMIUN UNO</div>
                                </div>
                                <div>
                                    <div  class="canales_hd-premiun-3">PREMIUN DOS</div>
                                </div>
                                <div>
                                    <div>INCLUYE MEMBRESÍA</div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/amazon_prime.png" alt="Amazon Prime">
                                    </div>
                                </div>
                                <div>
                                    <div>ACCESO A LA PLATAFORMA</div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/HBO_max.png" alt="HBO Max">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <br>

            <section id="contacto">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">Contactanos</h1>
                        <h6 class="text-center">Puedes utilizar cualquiera de las siguientes formas para comunicarte con nosotros y poder darte más información y/o atender tus dudas respecto a los servicios que brindamos.</h6>
                    </div>

                    <div class="row">
                        <div class="card shadow">
                            <div class="card-body">
                                <div id="map" class="map"></div>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/direccion.png">
                                    </div>
                                    <div>Calle Tercera #6, Zona Centro, Heroica Matamoros, Tamaulipas, CP 87300</div>
                                </div>
                                <div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/telefono.png">
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <a href="">8689070479</a>
                                            </li>
                                            <li>
                                                <a href="">8688289341</a>
                                            </li>
                                            <li>
                                                <a href="">8682062028</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <img src="<?php echo IMAGES; ?>/email.png">
                                    </div>
                                    <div>
                                        <a href="">info@dish-matamoros.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="container">
                    <div class="text-center">&reg; 2022 Derechos reservados - Dish Matamoros</div>
                    <div>
                        <ul>
                            <li>
                                <a href="">
                                    <img src="<?php echo IMAGES; ?>/facebook.png">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="<?php echo IMAGES; ?>/whatsapp.png">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="<?php echo IMAGES; ?>/twitter.png">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="<?php echo IMAGES; ?>/telegram.png">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>

        </section>
<?php require INCLUDES.'footer.php'; ?>