<?php
require_once("../connection.php");
session_start();
    if(!($_SESSION['user']))  {
        header('location: ../login/login.html');
    };
if(isset($_POST['post'])){
    $judul  =   $_POST['judul'];
    $isi    =   $_POST['isi'];
    $nama   =   $_POST['nama'];
    
    if($nama == "admin"){
        echo '<script>setTimeout(function () { swal.fire("ERROR!", "hanya admin yang dapat menggunakan admin!")}, 150);</script>';
    }
    elseif(empty($judul)||empty($isi)){
        echo '<script>setTimeout(function () { swal.fire("ERROR!", "isien kabeh!")}, 150);</script>';
    }
    elseif(empty($nama)){
        $nama='unknow';
    }
    else{
        $sql="INSERT INTO post (nama, judul, isi) VALUES (:nama, :judul, :isi)";
        $siap=$db->prepare($sql);
        $siap->bindvalue(':nama', $nama);
        $siap->bindValue(':judul', $judul);
        $siap->bindValue(':isi', $isi);
        // var_dump($siap);
        $hasil=$siap->execute();
        if($hasil){
            header('location: ../index.php');
        }

    }
}
?>
<html>
<head>
    <title>post</title>
    <link rel="stylesheet" href="./post.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <img src="https://cdn.pixabay.com/photo/2018/03/15/19/35/cartoon-3229316_640.png" id="img">
    <form method="post" name="post">
        <div id="post">
            <input type="text" placeholder="Nama Pena" name="nama"><br><br>
            <input type="text" placeholder="Judul Post" name="judul"><br>
            <textarea placeholder="isilah dengan sesuatu yang tidak bermanfaat" name="isi"></textarea><br>
            <input type="submit" name="post" Value="Kirim">
        </div>
    </form>
</body>

</html>