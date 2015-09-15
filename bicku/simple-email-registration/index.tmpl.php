<!-- This is my view;-->
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	ul, li {
		margin: 0;
		padding: 0;
	}
	li {
		list-style: none;
	}
	.notice {
		color: red;
		font-style: italic;
	}
	</style>
</head>
<body>
	<h1>Join the Mailing List</h1>
	<?php if ( isset($status) ) : ?>
	<p class="notice"> <?php echo $status; ?> </p>
	<?php endif; ?>
	<form action="" method="post">
		<ul>
			<li>
				<label for="name">Your Name: </label>
				<input type="text" name="name" value="<?= old('name'); ?>">
			</li>
			<li>
				<label for="email">Your Email Address: </label>
				<input type="text" name="email" value="<?= old('email'); ?>">
			</li>
			<li>
				<input type="submit" value="Sign Up!">
			</li>
		</ul>
	</form>
	<br /><br />
	<a href="admin/registered_users.php"><input type="button" value="Registered Users"></a>
	
</body>
</html>