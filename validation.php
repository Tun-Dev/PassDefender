<?php
        session_start();

        $con = mysqli_connect('localhost','root','Tungbulu1999');

        mysqli_select_db($con, 'userreg');

        $email = $_POST['email'];
        $sec1 = $_POST['security1'];
        $sec2 = $_POST['security2'];

        $s = "SELECT * FROM `usertable` WHERE '$sec1' in (sec1 , sec2 , sec3 , sec4 , sec5 , sec6) && '$sec2' in (sec1 , sec2 , sec3 , sec4 , sec5 , sec6) && '$email' in (email)";
        // " select * from usertable where '$email' = email && '$sec1' = sec1-sec6 && '$sec2' = sec1-sec6 "

        $result = mysqli_query($con, $s);

        $num = mysqli_num_rows($result);


        if($email === ''){
                echo '<script>alert("No Email inputed");window.location.href = "./Login.php";</script>';
                // header('location:Login.php');
        }elseif($num != 1){
                echo '<script>alert("Wrong Info Inputed!");window.location.href = "./Login.php";</script>';
        }
        elseif($num == 1){
                $_SESSION['username'] = $email;
                header('location:home.php');
        }else{
                header('location:Login.php');
        }


?>
        