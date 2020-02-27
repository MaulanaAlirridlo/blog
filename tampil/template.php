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
    if(isset($_GET['delkomen'])){ 
        $stmt = $db->prepare('DELETE FROM komen WHERE idkomen = :idkomen') ;
        $stmt->execute(array(':idkomen' => $_GET['delkomen']));
    
        header("Location: template.php?idpost=$idpost?action=deleted");
        exit;
    } 
    if(isset($_POST['edit'])){
        $nama=$_POST['namaedit'];
        $isikomen=$_POST['isikomenedit'];
        $idkomen=$_POST['idkomenedit'];
        $stmt = $db->prepare('UPDATE komen SET nama = :nama, isikomen = :isikomen WHERE idkomen = :idkomen') ;
        $stmt->execute(array(
            ':nama' => $nama,
            ':isikomen' => $isikomen,
            ':idkomen' => $idkomen
        ));
        header("Location: template.php?idpost=$idpost?action=updated");
        exit;
    }

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
    <div class="isiconten">
        <?php
            echo "<div class='conten-header'><img src='../uploads/$row[nama_gambar].$row[format_gambar]' class='gambarconten'><br>";
            echo '<h1>'.$row['judul'].'</h1>';
            echo '<h4>'.$row['nama'].'</h4>';
        ?>
        <div class="edit-delete">
            <a href="../post/edit-post.php?id=<?php echo $row['idpost'];?>">Edit</a> |
            <a href="javascript:delpost('<?php echo $row['idpost'];?>','<?php echo $row['judul'];?>','<?= "$row[nama_gambar].$row[format_gambar]"?>')">Delete</a>
        </div>
        </div>
    
        <div class="conten">
            <?php	
		        echo '<p>'.$row['isi'].'</p>';
	        ?>
        </div>
    </div>
    <br>
    <div class="komen">
        <?php foreach($data as $item): ?>
            <div class="isikomen">
                <h2 class="nama"><?= $item->nama?></h2>
                <p class="isi"><?= $item->isikomen?></p>
            </div>
            <?php if($user['iduser']==$item->iduser):?>
                <div class="editkomen">
                    <label class="pointer" for="komen-<?= $item->idkomen ?>"">Edit</label> |
                    <a href="javascript:delkomen('<?php echo $item->idkomen;?>','<?php echo $idpost;?>')">Delete</a>
                </div>
                <input class="check" type="checkbox" id="komen-<?= $item->idkomen ?>" name="komen<?= $item->idkomen ?>">
                <br>
                <div class="edit none">
                    <form method="post">
                        <input type="hidden" value="<?= $item->idkomen ?>" name="idkomenedit">
                        <input type="hidden" value="<?php echo $user['iduser']?>" name="iduseredit">
                        <input type="text" placeholder="nama" name="namaedit" value="<?= $item->nama ?>"><br>
                        <textarea placeholder="isi komentar" name="isikomenedit"><?= $item->isikomen ?></textarea><br>
                        <input type="submit" value="simpan" name="edit">
                    </form>
                </div><br>
            <?php endif;?>
        <?php endforeach; ?>
        <div class="inputkomen">
            <form method="post">
                <?php if($user): ?>
                <input type="hidden" value="<?php echo $user['iduser']?>" name="iduser">
                <input type="text" placeholder="nama" name="nama"><br>
                <textarea placeholder="isi komentar" name="isikomen"></textarea><br>
                <input type="submit" value="kirim" name="kirim">
                <?php else: ?>
                <div style="text-align:center; width: 100%; height: auto; color: white; background-color:rgba(0, 0, 0, 0.7);">
                    <h2>Silahkan Login untuk Berkomentar</h2>
                </div>
                <?php endif;?>
            </form>
        </div>
    </div>
    <script language="JavaScript" type="text/javascript">
function delkomen(id,idpost){
    if (confirm("Are you sure you want to delete it?")) {
        window.location.href = 'template.php?idpost='+idpost+'&delkomen=' + id;
    }
};
function delpost(id, title, gambar)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'index.php?delpost=' + id + '&gambar=' + gambar;
  }
}
</script>
    <?php include('../foot/footer1.html') ?>
</body>

</html>