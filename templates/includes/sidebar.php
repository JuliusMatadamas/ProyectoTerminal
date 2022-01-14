<div class="sidebar close">
    <div class="logo-details">
        <a href="#">
            <img src="<?php echo IMAGES; ?>/logo-bg-transparent-white.png" alt="Dish Matamoros">
            <img src="<?php echo IMAGES; ?>/logo-i.png" alt="Dish Matamoros">
        </a>
    </div>
    <ul class="nav-links">
        <!-- inicio -->
        <li>
            <a href="#">
                <i class="fas fa-th"></i>
                <span class="link_name">Inicio</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Inicio</a></li>
            </ul>
        </li>
        <!-- almacén -->
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fas fa-warehouse"></i>
                    <span class="link_name">Almacén</span>
                </a>
                <i class='fas fa-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Almacén</a></li>
                <li><a href="#">Entradas</a></li>
                <li><a href="#">Salidas</a></li>
            </ul>
        </li>
        <!-- empleados -->
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span class="link_name">Empleados</span>
                </a>
                <i class='fas fa-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Empleados</a></li>
                <li><a href="#">Ingresar</a></li>
                <li><a href="#">Consulta/Editar</a></li>
            </ul>
        </li>
        <!-- usuarios -->
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fas fa-user-lock"></i>
                    <span class="link_name">Usuarios</span>
                </a>
                <i class='fas fa-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Usuarios</a></li>
                <li><a href="#">Nuevo</a></li>
                <li><a href="#">Consulta/Editar</a></li>
            </ul>
        </li>
        <!-- roles -->
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fas fa-user-shield"></i>
                    <span class="link_name">Roles</span>
                </a>
                <i class='fas fa-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Roles</a></li>
                <li><a href="#">Nuevo</a></li>
                <li><a href="#">Consulta/Editar</a></li>
            </ul>
        </li>
        <!-- asignaciones -->
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fas fa-list-ul"></i>
                    <span class="link_name">Asignaciones</span>
                </a>
                <i class='fas fa-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Asignaciones</a></li>
                <li><a href="#">Nueva</a></li>
                <li><a href="#">Consulta/Editar</a></li>
            </ul>
        </li>
        <!-- servicios -->
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fas fa-wrench"></i>
                    <span class="link_name">Servicios</span>
                </a>
                <i class='fas fa-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Servicios</a></li>
                <li><a href="#">Pendientes</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </li>
        <!-- mensajes -->
        <li>
            <a href="#">
                <i class="far fa-comment-dots"></i>
                <span class="link_name">Mensajes</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Mensajes</a></li>
            </ul>
        </li>
        <!-- profile -->
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="<?php echo IMAGES; ?>/profiles/profile.png" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">Prem Shahi</div>
                    <div class="job">Web Desginer</div>
                </div>
                <i class='fas fa-sign-in-alt' ></i>
                <input type="hidden" value="<?php echo URL; ?>logout">
            </div>
        </li>
    </ul>
</div>
