<?php
    // //mysqli
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $db = "blog";
    // $connect = mysqli_connect($host,$user,$pass,$db)

    //pdo
	$db = new PDO('mysql:host=localhost;dbname=blog', "root", "");
    // try {
        // $host= 'us-cdbr-iron-east-04.cleardb.net'; 
        // $user = 'bce978a18a751f';
        // $pass = '054ca5b6';
        // $db = 'heroku_2faaa787ccf495e';
        // $port=3306;
        // $db = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
        // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected !";
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
?>
