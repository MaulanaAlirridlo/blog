<?php
    // //mysqli
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $db = "blog";
    // $connect = mysqli_connect($host,$user,$pass,$db)

    //pdo
    // try {
        $user = "root";
        $pass = "";
        $db = new PDO("mysql:host=localhost;dbname=blog", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected !";
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
?>