<?php
        //pdo
        require_once("../connection.php");

        if(isset($_POST['register'])){

            $username = $_POST['username'];
            $password =  $_POST['password'];
            $confirm = $_POST['confirm'];
            $status = 'user';

            if(!empty($username) && !empty($confirm) && !empty($password)) {
                    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                    $cekuser = $db->prepare("SELECT username FROM user WHERE username = :username");
                    $cekuser->bindParam(':username', $username);
                    $cekuser->execute();
                if($cekuser->rowCount() > 0){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "username sudah ada!")}, 100);</script>';
                }
                elseif($password != $confirm){
                    echo '<script>setTimeout(function () { swal.fire("ERROR!", "confirm password dan password harus sama!")}, 100);</script>';
                }
                else{
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO user (username, password, status) VALUES (:username, :password, :status)";
                    $stmt = $db->prepare($sql);

                    $stmt->bindValue(':username', $username);
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
</head>

<body>
    <script src="../style/sweetalert2.all.min.js"></script>
    <img src="https://cdn.pixabay.com/photo/2018/03/13/20/23/cartoon-3223656_960_720.png" id="img">
    <div id="daftar">
        <h1>Register</h1>
        <form method="post">
            <div id="subdaftar">
                <div id="subdaftaratas">
                    <label>Username</label><br><input type="text" name="username"><br>
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