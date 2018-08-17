<?php
    echo "Welcome to the global admin dashboard.";
    ?><h2>My Articles</h2>
    <br>  <table style="width:100%">
  <tr>
    <th style="text-align: left;">Title</th>
    <th style="text-align: left;">Date Posted</th> 
    <th style="text-align: left;"></th>
  </tr><?php
$count = 0;
    foreach ($articles as $article):
      $edit = true;
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
        <td><?php echo $article->get_title(); ?></td>
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