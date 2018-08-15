<?php
    echo "Welcome to the node administrator dashboard.";
?>

<h2>My Articles</h2>
    <br>  <table style="width:100%">
  <tr>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr>
  <b><a href="includes/add.php">Add article &lowast;</a></b>
    <br><br>
 <?php 
    foreach ($articles as $article):
        ?>
       <tr>
    <td><?php echo $article->get_title(); ?></td>
    <td><small><?php echo date("Y-m-d",$article->get_date()); ?></small></td> 
    <td><a href=<?php $i = $article->get_id(); echo "./includes/edit.php?edit=$i";?>>Edit</a></td>
    <td><a href=<?php $i = $article->get_id(); echo "./includes/delete.php?edit=$i";?>>Delete</a></td>
     </tr>
       
    <?php endforeach;?>
    </table>
    