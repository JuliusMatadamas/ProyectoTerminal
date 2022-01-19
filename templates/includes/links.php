<?php

for ($i = 0; $i < count($_SESSION["permisos"]); $i++)
{
?>
    <li>
        <div class="icon-link">
            <a href="#">
                <i class="fas <?php echo $_SESSION["permisos"][$i]["icon"]; ?>"></i>
                <span class="link_name"><?php echo $_SESSION["permisos"][$i]["modulo"]; ?></span>
            </a>
            <i class='fas fa-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#"><?php echo $_SESSION["permisos"][$i]["modulo"]; ?></a></li>
<?php
    for ($j = 0; $j < count($_SESSION["permisos"][$i]["submodulos"]); $j++)
    {
?>
                <li><a href="<?php echo URL.$_SESSION["permisos"][$i]["submodulos"][$j]["href"]; ?>"><?php echo $_SESSION["permisos"][$i]["submodulos"][$j]["submodulo"]; ?></a></li>
<?php
    }
?>
        </ul>
    </li>
<?php
}
