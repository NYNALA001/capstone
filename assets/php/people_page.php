<h1>CAIR Members</h1>
<br>
        <?php
        $count = 0;
        $p = 0;
        if(isset($_GET['perm'])){
            $p = $_GET['perm'];
        }
        if ($p !=2){
                foreach ($people as $person):
                    if($p != 3){
                        echo $p;
                        if (($person-> get_permission() == 1 || $person->get_permission() == 2)){
                        $url =$person->get_dp_url();
                        $name =$person->get_name();
                        $surname = $person->get_surname();
                        $location = 'None';
                        $r_group = 'None';

                        $node_id = $person->get_node_id();
            
                        
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
                    }else if (($person-> get_permission() > 0) && ($person-> get_permission() <4)){
                            $permission = $person-> get_permission();
                            $url =$person->get_dp_url();
                            $name =$person->get_name();
                            $email =$person->get_email();
                            $surname = $person->get_surname();
                            $location = 'None';
                            $r_group = 'None';
            
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
                            ";
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
            }
        else if ($p == 2){
            
            $id = $user->get_node_id();

            // $nodes = unserialize($_SESSION['nodes']);
            $researchers = 'None';
            $node_focus = 'None';
            $location = 'None';

            foreach ($nodes as $tm):
                $na = $tm->get_name();
                $r = $tm->get_researchers();
                $x = $tm->count_researchers();
                $node_id = $tm ->get_id();
                if ($node_id == $id)
                {    
                    $node_focus = $tm->get_focus();
                    $location = $tm->get_name();
                    $researchers = $r;
                    break;
                }
            endforeach;
            foreach ($researchers as $researcher):
            
                $url = $researcher->get_dp_url();
                $name = $researcher->get_name();
                $surname = $researcher->get_surname();
                echo "
                <div class='node-panel'>
                <div class='node-dp-psanel'>
                    <img src=\"$url\" alt=\"$name thumbnail\">
                </div>
                <div><p><b>$name $surname</b>
                <br>Research group: $node_focus
                <br>Location: $location </p>
                
                </div>
                </div>
                ";
                $count++;
                endforeach;
               
            }
                ?>
<?php if ($count==0)
    echo "No people available";?>