<?php
require_once("../connection.php");
session_start();
    if(!($_SESSION['user']))  {
        header('location: ../login/login.html');
    }
    else{
        $user = $_SESSION['user'];
    }
if(isset($_POST['post'])){
    $iduser =   $_POST['iduser'];
    $judul  =   $_POST['judul'];
    $isi    =   $_POST['isi'];
    $nama   =   $_POST['nama'];
    $namagambar = $_FILES["gambar"]["name"];
    $tipegambar = $_FILES["gambar"]["type"];
    $ukurangambar = $_FILES["gambar"]["size"];
    
    if($nama == "admin"){
        echo '<script>setTimeout(function () { swal.fire("ERROR!", "hanya admin yang dapat menggunakan admin!")}, 150);</script>';
    }
    elseif(empty($judul)||empty($isi)){
        echo '<script>setTimeout(function () { swal.fire("ERROR!", "isien kabeh!")}, 150);</script>';
    }
    elseif(empty($nama)){
        $nama='unknow';
    }
    else {
        $target_dir = "../uploads/";
        // $target_file = $target_dir.basename($_FILES["gambar"]["name"]);
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageFileType = pathinfo($namagambar, PATHINFO_EXTENSION);
        $namagambar=sha1($namagambar . mt_rand());
        $target_file = $target_dir.basename("$namagambar.$imageFileType");
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - ".$check["mime"].
            // ".";
            $uploadOk = 1;
        } 
        else {
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "File is not an image!")}, 150);</script>';
            $uploadOk = 0;
        }
        // if (file_exists($target_file)) {

        //     $namagambar = sha1($_FILES["gambar"]["name"]);
        //     $uploadOk = 1;
        // } 
        if ($_FILES["gambar"]["size"] > 1000000) {
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "Sorry, only JPG, JPEG, PNG & GIF files are allowed!")}, 150);</script>';
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "Terjadi Error saat Mengupload Gambar!")}, 150);</script>';
        }
        else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo '<script>setTimeout(function () { swal.fire("SUCCESS!","The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded!")}, 150);</script>';
            } 
            else {
                echo '<script>setTimeout(function () { swal.fire("ERROR!", "Terjadi Error saat Mengupload Gambar!")}, 150);</script>';
            }

            $sql = "INSERT INTO post (iduser, nama, judul, isi, nama_gambar, format_gambar, tipe_gambar, ukuran_gambar) VALUES (:iduser, :nama, :judul, :isi, :nama_gambar, :format_gambar, :tipe_gambar, :ukuran_gambar)";
            $siap = $db -> prepare($sql);
            $siap -> bindValue(':iduser', $iduser);
            $siap -> bindvalue(':nama', $nama);
            $siap -> bindValue(':judul', $judul);
            $siap -> bindValue(':isi', $isi);
            $siap -> bindValue(':nama_gambar', $namagambar);
            $siap -> bindValue(':format_gambar', $imageFileType);
            $siap -> bindValue(':tipe_gambar', $tipegambar);
            $siap -> bindValue(':ukuran_gambar', $ukurangambar);
            // var_dump($siap);
            $hasil = $siap -> execute();
            if ($hasil) {
                header('location: ../index.php');
            }
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
        <link rel="icon" href="../logo.png">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <img src="https://cdn.pixabay.com/photo/2018/03/15/19/35/cartoon-3229316_640.png" id="img">
    <form method="post" enctype="multipart/form-data">
        <div id="post">
            <input type="hidden" value="<?php echo $user['iduser']?>" name="iduser">
            <input type="text" placeholder="Nama Pena" name="nama"><br><br>
            <input type="text" placeholder="Judul Post" name="judul"><br>
            <textarea placeholder="isilah dengan sesuatu yang tidak bermanfaat" name="isi"></textarea><br><br>
            <input type="file" name="gambar" id="gambar" accept="image/*" /><br>
            <input type="submit" name="post" Value="Kirim">
        </div>
    </form>
</body>

</html>