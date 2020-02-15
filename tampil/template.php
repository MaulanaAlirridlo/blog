<?php
    include('../connection.php');
    session_start();
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
     } else {
         $user = false;
     }

    $stmt = $db -> prepare('SELECT * FROM post WHERE idpost = :idpost LIMIT 1');
    $stmt -> execute(array(':idpost' => $_GET['idpost']));
    $row = $stmt -> fetch();
    $idpost = $row['idpost'];
    $id=$_GET['idpost'];
    // var_dump($id);
    if (isset($_POST['kirim'])) {
        $nama=$_POST['nama'];
        $isikomen=$_POST['isikomen'];
        $iduser=$_POST['iduser'];
        if($_POST['nama']=='admin'){
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "hanya admin yang dapat menggunakan admin!")}, 150);</script>';
        }
        if(empty($_POST['nama'])||empty($_POST['isikomen'])){
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "isien kabeh!")}, 150);</script>';
        }
        else{
            $sql = "INSERT INTO komen (iduser, idpost, nama, isikomen) VALUES (:iduser, :idpost, :nama, :isikomen)";
            $stm = $db -> prepare($sql);
            $stm -> bindvalue(':iduser', $iduser);
            $stm -> bindparam(':idpost', $idpost);
            $stm -> bindvalue(':nama', $nama);
            $stm -> bindValue(':isikomen', $isikomen);
            // var_dump($siap);
            $hasil = $stm -> execute();
            // if($hasil){
            //     header("Refresh: 0");  
            // }
        }
    };
    $stm = $db -> query("SELECT * FROM komen WHERE idpost = '$id'");
    $data = [];
    while ($item = $stm -> fetch(PDO::FETCH_OBJ)) {
        $data[] = $item;
    };
    // if ($row['idpost'] == '') {
    //     header('Location: ./');
    //     exit;
    // };

?>
<!DOCTYPE html>

<head>
    <title>Blog - <?php echo $row['judul'];?></title>
    <link rel="stylesheet" href="template.css">
</head>

<body>
    <?php include('../head/header1.php'); ?>
<script src="../style/sweetalert2.all.min.js"></script>
    <?php
        if(isset($_GET['status'])){ 
            echo '<h3>Post '.$_GET['status'].'.</h3>'; 
        }
    ?>
    <div class="conten">
        <?php	
		echo '<div>';
		echo '<h1>'.$row['judul'].'</h1>';
		echo '<p>'.$row['isi'].'</p>';				
		echo '</div>';
	?>
    </div>
    <br>
    <div class="komen">
        <?php foreach($data as $item): ?>

            <div class="isikomen">
                <h2 class="nama"><?= $item->nama?></h2>
                <p class="isi"><?= $item->isikomen?></p>
            </div>
            <!-- <?php if($user['iduser']==$item->iduser):?>
                <div class="dropdown1">
                    <button class="dropbtn1"><img src="../panah.png"></button>
                    <div class="dropdown-content1">
                        <a href="./post/edit-post.php?id=<?php echo $item->idpost?>">Edit</a>
                        <a href="javascript:delpost('<?php echo $item->idpost;?>','<?php echo $item->judul;?>')">Delete</a>
                    </div>
                </div>
                <?php endif;?> -->
        <?php endforeach; ?>
        <div class="inputkomen">
            <form method="post">
                <input type="hidden" value="<?php echo $user['iduser']?>" name="iduser">
                <input type="text" placeholder="nama" name="nama"><br>
                <textarea placeholder="isi comment" name="isikomen"></textarea><br>
                <input type="submit" value="kirim" name="kirim">
            </form>
        </div>
    </div>

</body>

</html>