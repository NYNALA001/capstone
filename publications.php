<?php
include './assets/php/session.php';
?>

<html lang="en">

<head>
<title>Pubs</title>
<?php include './assets/php/dependencies.php';
?>
</head>

<body>
	<?php include './assets/php/header.php';?>

	<div>

		<br> <br>
		<table style="width: 100%">
			<tr>
				<th style="text-align: left;">Publication</th>
				<th style="text-align: left;">Date Posted</th>
				<th style="text-align: left;"></th>
			</tr>

			<div>
				<form method="GET" action="" id="searchform">
					<input type="text" name="search" placeholder="article name"> <input
						type="submit" name="action" value="Search">
				</form>
				<form method="GET" action="" id="searchform">
					<select name="filter">
						<option value="">Researchers</option>
						<option value="">Nodes</option>
						<option value="">Publication</option>

					</select>
				</form>

				<?php
				$searchcounter = 0;
				if(isset($_GET['search'])){
					$search = $_GET['search'];
					echo "<br><br><b>Results</b><br>";
					if(strlen($search) >0){

						foreach ($articles as $article){
							if(strpos(strtolower($article->get_title()),strtolower($search)) !== false){
								$searchcounter++
								?>
				<p>
					<?php echo $article->get_title();?>
				</p>

				<?php }

						}
          if($searchcounter==0){ ?>
				<br>
				<p>
					<?php echo "No results found";?>
				</p>
				<?php }
					}

           if(strlen($search) ==0){ ?>
				<br>
				<p>
					<?php echo "No input was inserted";?>
				</p>
				<?php }

				}
				?>

			</div>

			<br>
			<br>
			<br>
			<?php 
			foreach ($articles as $article):
			?>
			<tr>

				<td><a href="article.php?id=<?php echo $article->get_id();?>"><?php echo $article->get_title(); ?>
				</a></td>
				<td><small><?php echo date("Y-m-d",$article->get_date());?> </small>
				
				</td>
			</tr>

			<?php endforeach;?>
		</table>
		<br> <br>

		<?php include './assets/php/footer.php';?>

</body>

</html>
