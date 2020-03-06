<?php
    include('../head/header1.php');
    include('../connection.php');
    if(isset($_POST["submit"])){
        if(empty($_POST['user'])){
            echo('isien sek gan');
        }else{
            $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
            $stmt->bindValue(':email', $_POST['user']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['lupa'] = $user;
            if($user){
                header('location:kirim-email.php');
            }else{
                echo('email tidak terdaftar');
            }
        }
    }
?>
<!DOCTYPE html>
<head>
    <title>Lupa Password</title>
    <link rel="stylesheet" href="lupa.css">
</head>
<body>
    <div class="parent">
        <div class="child1">
            <form method="post">
                <div class="input">
                    <label>Masukkan Email Anda</label><br>
                    <input type="text" name="user">
                </div>
                <div clas="submit">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>