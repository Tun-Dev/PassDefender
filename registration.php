<?php

        // $email="zico4reel@gmail.com";//this will be gotten from an actual $_GET or $_POST request
        // $filename = urlencode($email);
        // $content = json_encode([
        //         "FistName"=> $_POST['firstName'],
        //         "pet_name"=>"parrot",
        //         "nickname"=>"outlaw"
        // ]);//this will be filled from an actual $_GET or $_POST request

        // file_put_contents($filename.".txt",$content);
        // $message = '';
        // $error = '';
        // if(isset($_POST["submit"])){
        //         if(empty($_POST["firstName"])){
        //                 $error = "<p> Enter First Name </p>";
        //         }
        //         else{
        //                 if(file_exists('users.json')){
        //                         $current_data = file_get_contents('users.json');
        //                         $array_data = json_decode($current_data, true);
        //                         $extra = array(
        //                                 'email' => $_POST['email'],
        //                                 'FirstName'    =>      $_POST['firstName'],
        //                                 'LastName'     =>      $_POST["lastName"],
        //                                 'Security'      =>      [
        //                                                                 $_POST['security1'],
        //                                                                 $_POST['security2'],
        //                                                                 $_POST['security3'],
        //                                                                 $_POST['security4'],
        //                                                                 $_POST['security5'],
        //                                                                 $_POST['security6'],
        //                                 //                         ],
        //                                 ]
        //                         );
        //                         $array_data[] = $extra;
        //                         $final_data = json_encode($array_data);
        //                         if(file_put_contents('users.json', $final_data)){
        //                                 $message = "<p>Account created successfully</p>";
        //                         }
        //                 }
        //         }
        // }

        session_start();

        $con = mysqli_connect('localhost','root','Tungbulu1999');

        mysqli_select_db($con, 'userreg');
        
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $sec1 = $_POST['security1'];
        $sec2 = $_POST['security2'];
        $sec3 = $_POST['security3'];
        $sec4 = $_POST['security4'];
        $sec5 = $_POST['security5'];
        $sec6 = $_POST['security6'];

        $s = " select * from usertable where email = '$email'";

        $result = mysqli_query($con, $s);

        $num = mysqli_num_rows($result);

        if($num == ''){
                echo '<script>alert("No email inserted");
                window.location.href="Signup.html"
                </script>';
        }else if($num == 1){
                echo '<script>alert("Email Already Taken");
                window.location.href="Signup.html"
                </script>';
        }else{
                $reg = " insert into usertable(email, firstName, lastName, sec1, sec2, sec3, sec4, sec5, sec6) values ('$email' , '$firstName' , '$lastName' , '$sec1' , '$sec2' , '$sec3' , '$sec4' , '$sec5' , '$sec6')";
                mysqli_query($con, $reg);
                echo"Registration Succesful";
                header('location:login.php');
        }

?>
