<?php
    include('../connection.php');

    $stmt = $db -> prepare('SELECT * FROM post WHERE idpost = :idpost LIMIT 1');
    $stmt -> execute(array(':idpost' => $_GET['idpost']));
    $row = $stmt -> fetch();
    $idpost = $row['idpost'];
    $id=$_GET['idpost'];
    // var_dump($id);
    if (isset($_POST['kirim'])) {
        $nama=$_POST['nama'];
        $isikomen=$_POST['isikomen'];
        if($_POST['nama']=='admin'){
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "hanya admin yang dapat menggunakan admin!")}, 150);</script>';
        }
        if(empty($_POST['nama'])||empty($_POST['isikomen'])){
            echo '<script>setTimeout(function () { swal.fire("ERROR!", "isien kabeh!")}, 150);</script>';
        }
        else{
            $sql = "INSERT INTO komen (idpost, nama, isikomen) VALUES (:idpost, :nama, :isikomen)";
            $stm = $db -> prepare($sql);
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
</head>

<body>
<script src="../style/sweetalert2.all.min.js"></script>
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
                <div class="komen-body">
                    <h2 class="nama"><?= $item->nama?></h2>
                    <p class="isi"><?= $item->isikomen?></p>
                </div>
            </div>

        <?php endforeach; ?>
        <div class="inputkomen">
            <form method="post">
                <input type="text" placeholder="nama" name="nama"><br>
                <textarea placeholder="isi comment" name="isikomen"></textarea><br>
                <input type="submit" value="kirim" name="kirim">
            </form>
        </div>
    </div>

</body>

</html>