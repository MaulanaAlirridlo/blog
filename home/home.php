<?php
session_start();
    if(!($_SESSION['user']))  {
        header('location: ../login/login.html');
    }
    else {
        $user =  $_SESSION['user'];
        echo "<h1>welcome $user[username]</h1>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pesbuk Timeline</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div id="background">
        <div id="post">
            <a href="../post/post.php"><button>post</button></a>
        </div>
        <div id="beranda">
            <a href="../index.php"><button>beranda</button></a>
        </div>
    </div>
</body>
</html>