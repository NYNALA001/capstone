<h1>New User Requests</h1>
<br>
        <?php
        $count = 0;
        foreach ($people as $person):
                if (($person-> get_permission() == 0)){
                    $url =$person->get_dp_url();
                    $name =$person->get_name();
                    $name = $person->get_name();
                    $surname = $person->get_surname();
                    $email = $person->get_email();
                    echo "
                    <div class='node-panel'>
                    <div class='node-dp-panel'>
                        <img src=\"$url\" alt=\"$name thumbnail\">
                    </div>
                    <div><p><b>$name $surname</b>
                    <br> Requested on 
                    <br><br>
                    <a href='./assets/php/server.php?confirm=$email'>Confirm</a> <a href='./assets/php/server.php?delete=$email'>Delete</a>
                    
                    </div>
                    </div>
                    ";
                    $count++;
                }
            
                
         endforeach;
         ?>
<?php if ($count==0)
    echo "No new user requests available";?>