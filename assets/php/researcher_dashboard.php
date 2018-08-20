<?php
    echo "Welcome to the researcher dashboard.";
?>

 <h2>My Articles</h2>
    <br>  <table style="width:100%">
  <tr>
    <th style="text-align: left;">Publication</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr>
  <b><a href="includes/add.php">Add article &lowast;</a></b>
    <br><br>
 <?php 
 $count = 0;
    foreach ($articles as $article):
      $edit = false;
      $as = $article->get_authors();
      foreach ($as as $t):
        
        if ($t == $user->get_email()){
          $edit = true;
        }
        else{
        }
      endforeach;
      if (!$edit)
      continue;
      $count++;
        ?>
       <tr>
        <td><a href="article.php?id=<?php echo $article->get_id();?>"><?php echo $article->get_title(); ?></a></td>
        <td><small><?php echo date('Y-m-d',$article->get_date()); ?></small></td> 
        <td><a href=<?php $i = $article->get_id(); echo "./includes/edit.php?edit=$i";?>>Edit</a></td>
        <td><a href=<?php $i = $article->get_id(); echo "./includes/delete.php?edit=$i";?>>Delete</a></td>
        </tr>
       
    <?php endforeach;
    ?>
    </table>
    <?php
    
    if($count==0)
    echo "<br>You haven't added any articles.<br>";
    ?>