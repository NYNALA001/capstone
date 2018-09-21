<!DOCTYPE html>
<html lang="en">
<head>
<title>CAIR - People</title>
<?php 	include 'assets/php/session.php';
		include 'assets/php/dependencies.php';
		?>

</head>
<body>
	<?php include './assets/php/header.php';?>

		 <h1>CAIR Members</h1>
<br>
        <?php
        $count = 0;
		foreach ($people as $person):
			if ($person-> get_permission() == 1 || $person->get_permission() == 2){
				$url =$person->get_dp_url();
				$name =$person->get_name();
				$surname = $person->get_surname();
				$location = 'test';
				$r_group = 'none';

				$node_id = $person->get_node_id();
    
				$nodes = unserialize($_SESSION['nodes']);
				
				foreach ($nodes as $tmp):
				
				$r = $tmp->get_name();
				$focus = $tmp->get_focus();
				$node_id_2 = $tmp ->get_id();

		

				if ($node_id_2 == $node_id){
					$location =  $r;
					$r_group = $focus;
					break;
				}
				endforeach;
				echo "
				<div class='node-panel'>
                <div class='node-dp-panel'>
                    <img src=\"$url\" alt=\"$name thumbnail\">
                </div>
				<div><p><b>$name $surname</b>
				<br>Research group: $r_group
				<br>Location: $location </p>
                
                </div>
				</div>
				";
				$count++;
			}
		 endforeach;?>
<?php if ($count==0)
    echo "No nodes available";?>
	<?php include './assets/php/footer.php';?>

</body>
</html>
