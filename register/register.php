<?php
require_once("../connection.php");
var_dump($db);

if(isset($_POST['register'])){
    // filter data yang diinputkan
    // $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (username, password) 
            VALUES (:username, :password)";
    $stmt = $connect->prepare($sql);

    // bind parameter ke query
    $params = array(
        // ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        // ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>