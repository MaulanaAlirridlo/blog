<?php
    include('../head/header1.php');
    $today = date('Y-m-d');
    $stmt = $db->prepare("SELECT * FROM token WHERE token=:token");
    $stmt->bindValue(':token', $_GET['t']);
    $stmt->execute();
    $token = $stmt->fetch(PDO::FETCH_ASSOC);
    if($token['dibuat']==$today){
        if(isset($_POST['simpan'])){
            $stmt = $db->prepare("SELECT * FROM token WHERE token=:token");
            $stmt->bindValue(':token', $token['token']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            if($password==$confirm){
                $password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $db->prepare('UPDATE user SET password = :password WHERE iduser = :iduser') ;
                $kirim=$stmt->execute(array(
                ':password' => $password,
                ':iduser' => $token['iduser']
                ));
                if($kirim){
                    header('location: ../login/login.html');
                }
            } else {
                echo 'password dan confirm password tidak sama';
            }
        }
    } else{
        header('Location: tokeninvalid.php');
    }
?>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="newpass.css">
</head>
<body>
    <div class=parent>
        <div class="child1">
            <form method="post">
                <div class="password">
                    <label>Paswword Baru</label>
                    <input type=password name="password">
                </div>
                <div class="confirm">
                    <label>Masukkan Ulang Password Baru</label>
                    <input type=password name="confirm">
                </div>
                <div class="submit">
                    <input type="submit" name="simpan" value="simpan">
                </div>
            </form>
        </div>
    </div>
</body>
</html>