<?php
    include 'connection.php';
    @include_once 'session.php';

    if($_SESSION['logged_in']=='false'){

        $errors = array();


        if(isset($_POST['login'])){
            //echo 'Login pressed<br>';
            $username = strtolower(mysqli_real_escape_string($dbc, $_POST['email']));
            $password = mysqli_real_escape_string($dbc, $_POST['password']);
            //echo $username;
            if (empty($username)){
                array_push($errors, "Email is required");
            }

            if (empty($password)){
                array_push($errors, "Password is required");
            }
            //continue to login
            if (count($errors)==0){
                //fetch data
                $query = "SELECT * FROM users WHERE user_email = '$username'";
                $result = mysqli_query($dbc, $query);
                if (isset($result)){
                    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $user_hash = $array['user_password'];
                    $user_permission = $array['user_permission'];
                    mysqli_free_result($result);
                    //echo "<br>user found<br>";
                    if (password_verify($password, $user_hash)){
                        //echo "password correct<br>";
                        $_SESSION['logged_in'] = 'true';
                        //echo $array['user_permission']."<br>"; 
                        if ($array['user_permission'] == 1){
                            $user = new Researcher;
                        }
                        if ($array['user_permission'] == 2){
                            $user = new Node_Administrator;
                        }
                        else if ($array['user_permission'] == 3){
                            $user = new Global_Administrator;
                        }
                        else{
                            $user = new Person;
                        }

                        $user -> set_details($array['user_name'], $array['user_surname'], $array['user_email'], $array['user_permission'], $array['node_id']);
                        $_SESSION['user'] = serialize($user);
                        $array="";
                        
                        echo '<script>
                        window.location = "index.php";
                        </script>';
                    }
                    else{
                        $user_hash="";
                        array_push($errors, "Your username/password is incorrect");

                    }

                }   
            } 
        }

        if (isset($_POST['register'])){
            $first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
            $email = mysqli_real_escape_string($dbc, $_POST['email']);
            $password1 = mysqli_real_escape_string($dbc, $_POST['password']);   
            $password2 = mysqli_real_escape_string($dbc, $_POST['password_confirmation']);   
            $node = 'null';
            if (isset($_POST['node'])){
                $node = mysqli_real_escape_string($dbc, $_POST['node']);
            }
            if (empty($first_name)){
                array_push($errors, "First name is required");
            }
            if (empty($last_name)){
                array_push($errors, "Last name is required");
            }
            if (empty($email)){
                array_push($errors, "Email is required");
            }
            if (empty($node) || $node=='null'){
                array_push($errors, "Node is required");
            }
            if (empty($password1)){
                array_push($errors, "Password is required");
            }
            if (strlen($password1) <6){
                array_push($errors, "Password must be at least 6 characters long");
            }
            if ($password1 != $password2){
                array_push($errors, "The two passwords do not match ");
            }

            $query = "SELECT * FROM users WHERE user_email = '$email'";
            $result = mysqli_query($dbc, $query);
            if (isset($result) && mysqli_fetch_array($result, MYSQLI_ASSOC)['user_email']==$email){
                array_push($errors, "Email already registered");
            }
            mysqli_free_result($result);
            if (count($errors) == 0){
                $options = array('cost'=>11);
                
                $hash = password_hash($password1, PASSWORD_BCRYPT, $options);

                $sql = "INSERT INTO users (`user_name`, `user_surname`, `user_email`, `user_password`, `user_permission`, `node_id`)
                            VALUES ('$first_name','$last_name','$email','$hash',0, '$node')";
                mysqli_query($dbc, $sql);
                
                
                $_SESSION['logged_in'] = 'true';
                $user = new Person;
                $user -> set_details($first_name, $last_name, $email, 0, $node);
                $_SESSION['user'] = serialize($user);

                echo '<script>
                window.location = "index.php";
                </script>';
            }
        
        }
    }
    else if($_SESSION['logged_in']=='true'){
        if(isset($_POST['create-node'])){
            //creating a new node
            $name = mysqli_real_escape_string($dbc, $_POST['node_name']);
            $focus = mysqli_real_escape_string($dbc, $_POST['node_focus']);
            $description = mysqli_real_escape_string($dbc, $_POST['node_description']);   
            $profile = mysqli_real_escape_string($dbc, $_POST['node_dp']);
            $url = 'assets/images/placeholder.jpg';
            $time = time();
            $sql = "INSERT INTO nodes (`node_name`, `research_focus`, `research_focus_description`, `dp_url`, `node_date`)
            VALUES ('$name','$focus','$description','$url',$time)";
            mysqli_query($dbc, $sql);
     
            echo '<script>
            window.location = "../../dashboard.php?confirm=node-created";
            </script>';
        }
        else if(isset($_GET['delete'])){
            //delete user
            $email = $_GET['delete'];
            $sql = "UPDATE `users` SET `user_permission` = 4 WHERE `user_email` = '$email'";
            mysqli_query($dbc, $sql);
            echo '<script>
            window.location = "../../dashboard.php?confirm=User-rejected";
            </script>';
        }else if(isset($_GET['confirm'])){
            //confirm new CAIR member 
            $email = $_GET['confirm'];
            $sql = "UPDATE `users` SET `user_permission` = 1 WHERE `user_email` = '$email'";
            mysqli_query($dbc, $sql);
            echo '<script>
            window.location = "../../dashboard.php?confirm=User-accepted";
            </script>';
        }else if(isset($_GET['make-admin'])){
            //confirm new CAIR member 
            $email = $_GET['make-admin'];
            $sql = "UPDATE `users` SET `user_permission` = 2 WHERE `user_email` = '$email'";
            mysqli_query($dbc, $sql);
            echo '<script>
            window.location = "../../dashboard.php?confirm=User-accepted";
            </script>';
        }else if(isset($_GET['remove-admin'])){
            //confirm new CAIR member 
            $email = $_GET['remove-admin'];
            $sql = "UPDATE `users` SET `user_permission` = 1 WHERE `user_email` = '$email'";
            mysqli_query($dbc, $sql);
            echo '<script>
            window.location = "../../dashboard.php?confirm=User-accepted";
            </script>';
        }else if(isset($_GET['make-global-admin'])){
            //confirm new CAIR member 
            $email = $_GET['make-global-admin'];
            $sql = "UPDATE `users` SET `user_permission` = 3 WHERE `user_email` = '$email'";
            mysqli_query($dbc, $sql);
            echo '<script>
            window.location = "../../dashboard.php?confirm=User-accepted";
            </script>';
        }
        else{            
            echo '<script>
            window.location = "index.php";
            </script>';}

    }

?>