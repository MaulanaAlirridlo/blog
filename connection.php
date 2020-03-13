<?php
    // //mysqli
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $db = "blog";
    // $connect = mysqli_connect($host,$user,$pass,$db)

    //pdo
    // try {
        $host= 'us-cdbr-iron-east-04.cleardb.net'; 
        $user = 'bce978a18a751f';
        $pass = '054ca5b6';
        $db = 'heroku_2faaa787ccf495e';
        $db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected !";
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
?>
