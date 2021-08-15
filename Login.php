<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylelogin.css">
    <link rel="stylesheet" href="styles/nav.css">
    <title>PassDefender</title>
</head>
<body>
    <div id="header">
        <div class="img">
          <a href="index.html"><img class="img1" src="images/PDlogo2.jpg" alt=""></a>
        </div>
        <div class="links">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="Signup.html">Sign Up</a></li>
            <li><a href="AboutUs.html">About Us</a></li>
          </ul>
        </div>
        <div id="openButton" class="mobile__hamburger">
          <div></div>
        </div>
      </div>
      <div id="myModal" class="mobile__nav__bg">
        <div class="mobile__nav">
          <div id="closeBtn" class="closeBtn">
            <div></div>
          </div>
          <ul>
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="Signup.html">Sign Up</a></li>
            <li><a href="AboutUs.html">About Us</a></li>
          </ul>
        </div>
      </div>
    <div class="body1">
        <h1>PassDefender</h1>

        <div class="select">
            <form action="validation.php" method="POST">
              <p>Email:</p>
              <input id="verify" name="email" class="input1" type="email" id="email"><br>
              <p id="secleft">
              <?php
                $questions = array("What's your Genotype:", "Favourite Colour:", "Favourite Movie:", "Favourite Sport:", "Best Food:", "Current Phone Brand:");

                function randomize($word){
                  return $word[rand(0, count($word)-1)];
                }
                function randomize2($word2){
                  return $word2[rand(0, count($word2)-1)];
                }
                function randomize3($word3){
                  return $word3[rand(0, count($word3)-1)];
                }
                echo randomize($questions);
              ?>
              </p>
              <input id="secinput1" name="security1" class="secinput1" type="text" id="email"><br>
              <p id="secleft">
              <?php
                echo randomize2($questions)
              ?>
              </p>
              <input id="secinput2" name="security2" class="secinput2" type="text" id="email"><br>
              <button>Verify</button>
            </form>
        </div>
    </div>

    <script src="js/opennav.js"></script>
</body>
</html>