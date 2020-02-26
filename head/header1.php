<?php
    include('../connection.php');
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
     } else {
         $user = false;
     }
?>
<html>
<head>
     <link rel="stylesheet" href="../head/header.css">
</head>
<body>
    <div class="header">
        <a href="../index.php"><img src="../head/logo.png" id="img1"></a>
        <div id="akun">
            <?php
            if($user)  {
                echo "<div class='welcome'> $user[username] <br> $user[status] ";
                echo '<div class="dropdown">';
                echo '<button class="dropbtn1"><img src="../panah.png"></button>';
                echo '<div class="dropdown-content">';
                echo '<a href="../home/home.php">home</a>';
                echo '<a href="../logout.php">log out</a>';
                echo '</div>';
                echo '</div></div></div>';
            }
            else {
                echo '<div class="akun2"><a href="../register/register.php"><button>sign up</button></a>';
                echo '<a href="../login/login.html"><button>sign in</button></a></div>';
            }
            ?>
        </div>
    </div>
</body>
</html>