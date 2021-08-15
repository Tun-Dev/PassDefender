<?php
  session_start();

  $connection = require_once './connection.php';


  if($note = ''){
    require_once './save.php';
  }

  $notes = $connection->getNotes();
  $names = $connection->getUserName();


  $currentNote = [
    'id' => '',
    'account' => '',
    'password' => '',
  ];

  if(isset($_GET['id'])){
    $currentNote = $connection->getNoteById($_GET['id']);
  }

  // echo '<prev>';
  // var_dump($currentNote);
  // echo '</prev>';

  if(!isset($_SESSION['username'])){
    header('location:login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
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
          <!-- <li><a href="index.html">Home</a></li>
            <li><a href="AboutUs.html">About Us</a></li> -->
            <li><a href="Logout.php">Logout</a></li>
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
            <!-- <li class="active"><a href="index.html">Home</a></li> -->
            <li><a href="logout.php">Log Out</a></li>
            <!-- <li><a href="#">About Us</a></li> -->
          </ul>
        </div>
      </div>
      <div class="mainbody">
          <div class="body1">
              <?php foreach ($names as $name): ?>
              <h1>Welcome <?php echo $name['firstName']; ?></h1>
              <?php endforeach; ?>
          </div>
          <div class="body2">
            <div class="body2inner">
              <div class="notes">
                  <?php foreach ($notes as $note): ?>
                    <div class="note">
                      <div class="account">
                        <?php echo $note['account']?>: 
                      </div>
                      <div class="password">
                        <?php echo $note['password'] ?>
                      </div>
                      <div class="trying">
                        <a href="?id=<?php echo $note['id'] ?>"><button class="edit">Edit</button></a>
                        <form class="" action="delete.php" method="post" >
                            <input type="hidden" name="id" value="<?php echo $note['id'] ?>"><button class="delete">Delete</button>
                        </form>
                      </div>


                    </div>
                  <?php endforeach; ?>
              </div>

              <!-- <button class = "keep1" >Create Keep</button> -->

              <form class="new-note" action="save.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>">
                  <?php $mail = $_SESSION['username']; ?>
                  <input type="hidden" class="user" name="email"  id="show" value="<?php echo $mail; ?>" readonly>
                  <input type="text" name="account" placeholder="Account Name" autocomplete="off" value="<?php echo $currentNote['account'] ?>" >
                  <textarea placeholder="Password" name="password" id="" cols="30" rows="4"><?php echo $currentNote['password'] ?></textarea>
                  <button class="keep2" >
                  <?php if ($currentNote['id']): ?>
                    Update Password
                  <?php else: ?>
                    Store Password
                  <?php endif; ?>
                  </button>
              </form>
            </div>
              
          </div>
      </div>

    <script src="js/opennav.js"></script>
</body>
</html>