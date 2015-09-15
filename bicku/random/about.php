
<?php include 'inc/header.php' ?>
	<div class="container">
		<p>Main content of about page</p>

		<p>
			<?php 
				echo htmlspecialchars($_GET['name']);
			 ?>
		</p>
	</div>

<?php include 'inc/footer.php' ?>