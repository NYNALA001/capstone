<h1>My Profile</h1>
    <div id="profile-pic"></div>
    
    
    
   <br>
    <br>
    Name: <?php echo $user->get_name();?> <br>
    Surname: <?php echo $user->get_surname();?> <br>
    Email: <?php echo $user->get_email();?><br>
    Node: <?php 
    $id = $user->get_node_id();
    
    $nodes = unserialize($_SESSION['nodes']);
                
    foreach ($nodes as $tmp):
    
    $r = $tmp->get_name();
    $node_id = $tmp ->get_id();
    if ($node_id == $id){
        echo $r;
        break;
    }
    endforeach;
    
    ?><br>

    
    <?php
    if ($user_permission == 1 || $user_permission == 2){
        echo "<br>
        <br>Research focus:<br>Location:";
    }?>