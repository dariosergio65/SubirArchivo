<?php //include ("db.php"); ?>
<?php include ("includes/header.php"); ?>

<div class="container p-4 col-6">
<form action="subirdatos.php" method="post" enctype="multipart/form-data">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">
			<h2>Subir Archivo al servidor</h2>
		</div>

		<?php 
		session_start();
		if (isset($_SESSION['mensaje'])) { ?>

			<div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert">
				<?= $_SESSION['mensaje'] ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php } session_unset(); ?>
		

			<div class="panel-body">
				<h4></h4><br>
				<input type="file" name="archivo" size="70">
				<br><br>
			</div>
			<div class="panel-footer">
				<br>
				<!-- <button class="btn btn-primary">Ingresar</button> -->
				<input type="submit" class="btn btn-primary" name="subir" value="Subir Archivo">
			</div>
	</div>
</form>
</div>


<?php include ("includes/footer.php"); ?>


