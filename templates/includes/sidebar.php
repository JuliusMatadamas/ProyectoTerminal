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
        <!-- Links -->
        <?php require INCLUDES.'links.php'; ?>
        <!-- profile -->
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="<?php echo IMAGES; ?>/profiles/profile.png" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">
                        <p><?php echo $_SESSION["info"]["nombre"]; ?></p>
                        <p><?php echo $_SESSION["info"]["apellido_paterno"]; ?></p>
                    </div>
                    <div class="job">
                        <?php echo $_SESSION["info"]["rol"]; ?>
                    </div>
                </div>
                <i class='fas fa-sign-in-alt' ></i>
                <input type="hidden" value="<?php echo URL; ?>logout">
            </div>
        </li>
    </ul>
</div>
