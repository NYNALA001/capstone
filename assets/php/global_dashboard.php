
  <div class="container">
    <div id="dashboard-navigation-panel" class="col-3">
      <div class="menu-heading">MANAGE CAIR</div>
      <div class="menu-item" onclick="change_view('publications');">Publications</div>
      <div class="menu-item" onclick="change_view('users');">People</div>
      <div class="menu-item" onclick="change_view('nodes');">Nodes</div>
      <div class="menu-item" onclick="change_view('reports');">Reports</div>
      <div class="menu-item" onclick="change_view('new-users');">New Users <?php $new_users = count_new_users($people);if ($new_users !=0 ){echo " ($new_users)";}
        ?></div>
      <div class="menu-heading">MY PROFILE</div>
      <div class="menu-item" onclick="change_view('profile');">Edit Profile</div>
      <div class="menu-item" onclick="change_view('settings');">Settings</div>
      <a href='./logout.php'><div class="menu-item">Logout</div></a>
    </div>
    <div id="dashboard-main-panel" class="col-6 main-content-panel">
      <div id="dashboard-header">
        <h1>DASHBOARD</h1>
        Welcome to the global admin dashboard.
      </div>
      
      <div id="publications-panel" class="dashboard-content">
      <h2>Publications</h2>
      Here's a list of all the publications.
      <br>  <table style="width:100%">
      <tr>
        <th style="text-align: left;">Title</th>
        <th style="text-align: left;">Date Posted</th> 
        <th style="text-align: left;"></th>
      </tr>
      <?php
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
          <td><a href="article.php?id=<?php echo $article->get_id();?>"><?php echo $article->get_title(); ?>
				</a></td>
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
      </div>

    <div id="reports-panel" class="dashboard-content hide">
        <h2>Reports</h2>
      </div>
    <div id="publications-panel" class="dashboard-content hide">
        <h2>Publications</h2>
      </div>
    
      <div id="new-users-panel" class="dashboard-content hide">
      <?php include './assets/php/users_page.php';?>
      </div>
    
      <div id="nodes-panel" class="dashboard-content hide">
        
      <?php include './assets/php/node_page.php';?>
      </div>
    
    <div id="users-panel" class="dashboard-content hide">
        <?php $_GET['perm']=3;
        include './assets/php/people_page.php';
        ?>
    </div>
    
      
      <div id="profile-panel" class="dashboard-content hide">
      <?php include './assets/php/profile_page.php';?>
      </div>
      
      <div id="settings-panel" class="dashboard-content hide">
        <h2>Settings</h2>
      </div>
    </div>
  </div>