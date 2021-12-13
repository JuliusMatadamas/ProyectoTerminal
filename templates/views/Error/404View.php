<?php require INCLUDES.'header.php'; ?>
		<section class="container flex">
			<div class="error__container text-center">
				<a href="<?php echo URL; ?>">
					<img src="<?php echo IMAGES; ?>/logo-bg-white-solid.png" alt="Dish Matamoros">
				</a>

				<h1>matamoros</h1>

				<h2>404</h2>

				<h3>Página no encontrada</h3>

				<p>La página solicitada no fue encontrada dentro del sitio web, verifique la url ingresada o de clic en el botón siguiente para regresar a la página anterior.</p>

				<button type="button" class="btn btn-outline-danger" onclick="historyReturn()">Regresar</button>
			</div>
		</section>
<?php require INCLUDES.'footer.php'; ?>