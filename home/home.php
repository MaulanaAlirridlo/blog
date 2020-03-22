<?php
session_start();
    if(!($_SESSION['user']))  {
        header('location: ../login/login.html');
    }
    else {
        $user =  $_SESSION['user'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="../logo.png">
</head>
<body>
    <div class="gambar11">
        <img src="../head/logo.png" class="img">
    </div>
    <div id="background">
        <?php if($user){
            echo "<h1>welcome $user[username]</h1>";
        } ?>
        <div id="post">
            <a href="../post/post.php"><button>post</button></a>
        </div>
        <div id="beranda">
            <a href="../index.php"><button>beranda</button></a>
        </div>
    </div>
</body>
</html>