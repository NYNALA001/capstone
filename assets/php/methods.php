<?php
    function count_new_users($people){
        $count = 0;
        if(isset($people)){
            foreach ($people as $u):
                if($u->get_permission()==0){
                    $count++;
                }
            endforeach;
        }
        return $count;
        
    }
?>