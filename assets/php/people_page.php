<h1>CAIR Members</h1>
<br>
        <?php
        $count = 0;
        $p = 0;
        if(isset($_GET['perm'])){
            $p = $_GET['perm'];
        }
        foreach ($people as $person):
            if($p != 3){
                echo $p;
                if (($person-> get_permission() == 1 || $person->get_permission() == 2)){
                    $url =$person->get_dp_url();
                    $name =$person->get_name();
                    $name = $person->get_name();
                    $surname = $person->get_surname();
                    echo "
                    <div class='node-panel'>
                    <div class='node-dp-panel'>
                        <img src=\"$url\" alt=\"$name thumbnail\">
                    </div>
                    <div><p><b>$name $surname</b>
                    <br>Research group: 
                    <br>Location: </p>
                    
                    </div>
                    </div>
                    ";
                    $count++;
                }
            }else if (($person-> get_permission() > 0) && ($person-> get_permission() <4)){
                    $url =$person->get_dp_url();
                    $name =$person->get_name();
                    $email = $person->get_email();
                    $surname = $person->get_surname();
                    $permission = $person-> get_permission();
                    echo "
                    <div class='node-panel'>
                    <div class='node-dp-panel'>
                        <img src=\"$url\" alt=\"$name thumbnail\">
                    </div>
                    <div><p><b>$name $surname</b>
                    <br>Research group: 
                    <br>Location: </p>";
                    if($permission==1){
                        echo "<a href='./assets/php/server.php?make-admin=$email'>Make node admin</a> <a href='./assets/php/server.php?make-global-admin=$email'>Make global admin</a>";
                    }
                    else if($permission==2){
                        echo "<a href='./assets/php/server.php?remove-admin=$email'>Remove node admin</a> <a href='./assets/php/server.php?make-global-admin=$email'>Make global admin</a>";
                    }
                    else if ($permission == 3 && $user->get_email() != $email ){
                        echo "<a href='./assets/php/server.php?remove-admin=$email'>Remove global admin</a>";
                    }
                    if ($user->get_email() != $email ){
                        echo "<a href='./assets/php/server.php?delete=$email'>Delete Account</a>";
                    }
                    echo"
                    </div>
                    </div>
                    ";
                    $count++;
            }
                
         endforeach;
         ?>
<?php if ($count==0)
    echo "No people available";?>