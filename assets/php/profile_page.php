<h1>My Profile</h1>
    <div id="profile-pic"></div>
    
    
    
   <br>
    <br>
    Name: <?php echo $user->get_name();?> <br>
    Surname: <?php echo $user->get_surname();?> <br>
    Email: <?php echo $user->get_email();?>
    
    <?php
    if ($user_permission == 1 || $user_permission == 2){
        echo "<br>
        <br>Research focus:<br>Location:";
    }?>