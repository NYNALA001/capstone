<h1>CAIR Nodes</h1>
<br>
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
<div id="add-node-panel">
    <h2>Add node</h2>
    <form action="./assets/php/server.php" method="post" id="add-node-form">
        <label>Node name</label><br>
        <input class="form-input" type="text" name="node_name"><br>
        <label>Research Focus</label><br>
        <input class="form-input" type="text" name="node_focus"><br>
        <label>Research focus description</label><br>
        <textarea class="form-input" name="node_description" cols="100" rows="10"></textarea><br>
        <label>Node Thumbnail</label><br>
        <input class="form-input" type="file" name="node_dp"><br>
        <input type="submit" value="Create" name="create-node">
    </form>
</div>