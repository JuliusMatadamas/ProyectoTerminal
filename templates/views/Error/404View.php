<?php require INCLUDES.'header.php'; ?>
		<section class="container flex">
			<div class="error__container text-center">
				<a href="<?php echo URL; ?>">
					<img src="<?php echo IMAGES; ?>/logo-bg-white.png" alt="Dish Matamoros">
				</a>

				<h1>ERROR 404</h1>

				<h2>Página no encontrada</h2>

				<p>Verifique la url o de clic en el botón siguiente para regresar a la página anterior.</p>

				<button type="button" class="btn btn-outline-danger" onclick="historyReturn()">Regresar</button>
			</div>
		</section>
<?php require INCLUDES.'footer.php'; ?>