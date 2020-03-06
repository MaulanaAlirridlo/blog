<?php
    include('../connection.php');
    $today = date('Y-m-d');
    $stmt = $db->prepare("SELECT * FROM token WHERE token=:token");
    $stmt->bindValue(':token', $_GET['t']);
    $stmt->execute();
    $token = $stmt->fetch(PDO::FETCH_ASSOC);
    if($token['dibuat']==$today){
        header('location:newpass.php');
    } else{
        header('Location: tokeninvalid.php');
    }
?>