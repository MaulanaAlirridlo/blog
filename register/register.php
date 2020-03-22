<?php
        //pdo
        require_once("../connection.php");

        if(isset($_POST['register'])){

            $username = $_POST['username'];
            $password =  $_POST['password'];
            $confirm = $_POST['confirm'];
            $email = $_POST['email'];
            $status = 'user';

            if(!empty($username) && !empty($confirm) && !empty($password) && !empty($email)) {
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $cekusername = $db->prepare("SELECT username FROM user WHERE username = :username");
                $cekusername->bindParam(':username', $username);
                $cekusername->execute();
                $cekemail = $db->prepare("SELECT email FROM user WHERE email = :email");
                $cekemail->bindParam(':email', $email);
                $cekemail->execute();
                if(!$username){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "format username salah!")}, 100);</script>';
                }
                elseif(strlen($username)>8){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "username melebihi 8 karakter!")}, 100);</script>';
                }
                elseif($cekusername->rowCount() > 0){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "username sudah ada!")}, 100);</script>';
                }
                elseif(!$email){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "format email salah!")}, 100);</script>';
                }
                
                elseif($cekuemail->rowCount() > 0){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "email sudah ada!")}, 100);</script>';
                }
                elseif($password != $confirm){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "confirm password dan password harus sama!")}, 100);</script>';
                }
                else{
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO user (username, email, password, status) VALUES (:username, :email, :password, :status)";
                    $stmt = $db->prepare($sql);

                    $stmt->bindValue(':username', $username);
                    $stmt->bindValue(':email', $email);
                    $stmt->bindValue(':password', $password);
                    $stmt->bindValue(':status', $status);

                    $result = $stmt->execute();

                    if($result){
                        header('location: ../login/login.html');
                    }
                }
            }
            else {
                echo '<script>setTimeout(function () { swal.fire("ERROR!", "isien kabeh!")}, 100);</script>';
            }
        }
    ?>
<html>
<head>
    <title>register</title>
    <link rel="stylesheet" href="./register.css">
    <link rel="icon" href="../logo.png">
</head>

<body>
    <script src="../style/sweetalert2.all.min.js"></script>
    <img src="../head/logo.png" id="img">
    <div id="daftar">
        <h1>Register</h1>
        <form method="post">
            <div id="subdaftar">
                <div id="subdaftaratas">
                    <label>Username</label><br><input type="text" name="username"><br><br>
                    <label>Email</label><br><input type="text" name="email"><br>
                </div>
                <div id="subdaftarbawah">
                    <label>Password</label><br><input type="password" name="password"><br><br>
                    <label>Confirm Password</label><br><input type="password" name="confirm">
                    <br>
                    <div class="tmbl">
                        <input type="submit" name="register" value="daftar" id="dftr">
                    </div>
                </div>
            </div>
            <div id=login>
                <label>Already have an account? </label><a href="../login/login.html">Login</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
// //mysqli
// require_once("../connection.php");

// if(isset($_POST['register'])){
//     $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//     $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//     // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//     $cekuser = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
//     if(mysqli_num_rows($cekuser) > 0) {
//         print "<script>alert('username sudah ada!');window.location='register.html'</script>";
//     }
//     elseif($_POST["password"] != $_POST["confirm"]){
//         print "<script>alert('confirm password dan password harus sama!');window.location='register.html'</script>";
//     }
//     else{
//         $query = mysqli_query($connect, "INSERT INTO user (username, password)
//                  values ('$username','$password');");
//         if($query) header("Location: ../login/login.html");
//     }
// }
?>