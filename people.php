<!DOCTYPE html>
<html lang="en">
<head>
<title>People</title>
<?php include 'assets/php/dependencies.php'?>
<?php include 'assets/php/server.php'?>
</head>
<body>
	<?php include './assets/php/header.php';?>

		 CAIR Members
		<br>
		<?php 
		$count = 0;
		foreach ($people as $person):
		?>
		<tr>

			<td> <?php
			$name = $person->get_name();
			$surname = $person->get_surname();
			if (!($name == "admin")) echo $name." ".$surname;
			?> <br>
			</td>


		</tr>

		<?php endforeach;?>
	<?php include './assets/php/footer.php';?>

</body>
</html>
