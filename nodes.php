<!DOCTYPE html>
<html lang="en">
<head>
<title>CAIR - Nodes</title>
<?php include 'assets/php/session.php'?>
<?php include 'assets/php/dependencies.php'?>
</head>
<body>
	<?php include './assets/php/header.php';?>
<div class="container">
	<h1>CAIR Nodes</h1>
        <?php
        $count = 0;
		foreach ($nodes as $node):
		?>
            <div class="node-panel">
                <div class="node-dp-panel">
                    <img src=<?php $url =$node->get_dp_url();
                                    echo "\"$url\"" ?> alt=<?php $name =$node->get_name();
                                    echo "\"$name thumbnail\"" ?>>
                </div>
                <div> <?php
                $name = $node->get_name();
                $focus = $node->get_focus();
                echo "<p><b>$name</b><br>$focus</p>";
                $count++;
                ?>
                </div>
			</div>

		<?php endforeach;?>
<?php if ($count==0)
    echo "No nodes available";?>

    </div>
	<?php include './assets/php/footer.php';?>

</body>
</html>
