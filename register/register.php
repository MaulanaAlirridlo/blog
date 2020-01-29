<?php
require_once("../connection.php");
// var_dump($db);

if(isset($_POST['register'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cekuser = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($cekuser) > 0) {
        print "<script>alert('username sudah ada!');window.location='register.html'</script>";
    }
    elseif($_POST["password"] != $_POST["confirm"]){
        print "<script>alert('confirm password dan password harus sama!');window.location='register.html'</script>";
    }
    else{
        $query = mysqli_query($connect, "INSERT INTO user (username, password)
                 values ('$username','$password');");
        if($query) header("Location: ../login/login.html");
    }
}
?>