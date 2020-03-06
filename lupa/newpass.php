<?php
    include('../head/header1.php');
    if(isset($_POST['simpan'])){
        $lupa=$_SESSION['lupa'];
        //tambahi cek password sama atau tidak
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare('UPDATE user SET password = :password WHERE iduser = :iduser') ;
        $kirim=$stmt->execute(array(
            ':password' => $password,
            ':iduser' => $lupa['iduser']
        ));
        if($kirim){
            header('location: ../login/login.html');
        }
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