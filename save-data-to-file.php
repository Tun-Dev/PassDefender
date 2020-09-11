<?php

        // $email="zico4reel@gmail.com";//this will be gotten from an actual $_GET or $_POST request
        // $filename = urlencode($email);
        // $content = json_encode([
        //         "FistName"=> $_POST['firstName'],
        //         "pet_name"=>"parrot",
        //         "nickname"=>"outlaw"
        // ]);//this will be filled from an actual $_GET or $_POST request

        // file_put_contents($filename.".txt",$content);
        $message = '';
        $error = '';
        if(isset($_POST["submit"])){
                if(empty($_POST["firstName"])){
                        $error = "<p> Enter First Name </p>";
                }
                else{
                        if(file_exists('users.json')){
                                $current_data = file_get_contents('users.json');
                                $array_data = json_decode($current_data, true);
                                $extra = array(
                                        'email' => $_POST['email'],
                                        'FirstName'    =>      $_POST['firstName'],
                                        'LastName'     =>      $_POST["lastName"],
                                        'Security'      =>      [
                                                                        $_POST['security1'],
                                                                        $_POST['security2'],
                                                                        $_POST['security3'],
                                                                        $_POST['security4'],
                                                                        $_POST['security5'],
                                                                        $_POST['security6'],
                                        //                         ],
                                        ]
                                );
                                $array_data[] = $extra;
                                $final_data = json_encode($array_data);
                                if(file_put_contents('users.json', $final_data)){
                                        $message = "<p>Account created successfully</p>";
                                }
                        }
                }
        }

?>
