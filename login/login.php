<?php 

require_once("../connection.php");
session_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username=:username";
    $stmt = $db->prepare($sql);
    //Bind value.
    $stmt->bindValue(':username', $username);
    //Execute.
    $stmt->execute();
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($password, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['user'] = $user;
            
            //Redirect to our protected page, which we called home.php
            header('Location: ../home/home.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('incorrect password combination!');
        }
    }
//     $query = "SELECT * FROM user WHERE username = :username AND password = :password";  
//                 $statement = $db->prepare($query);  
//                 $statement->execute(  
//                      array(  
//                           'username'     =>     $_POST["username"],  
//                           'password'     =>     $_POST["password"] 
//                      )  
//                 );  
//                 $count = $statement->rowCount();  
//                 if($count > 0)  
//                 {  
//                      $_SESSION["username"] = $_POST["username"];  
//                      header("location:../home/home.php");  
//                 }  
//                 else  
//                 {  
//                      echo "Wrong Data";  
//                 }  
}
    ?>