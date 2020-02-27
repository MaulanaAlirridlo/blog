<?php 
require('../connection.php');
try {

    $stmt = $db->prepare('SELECT * FROM post WHERE idpost = :idpost');
    $stmt->execute(array(':idpost' => $_GET['id']));
    $row = $stmt->fetch(); 

} catch(PDOException $e) {
    echo $e->getMessage();
}
if(isset($_POST['submit'])){
    $judul  =   $_POST['judul'];
    $isi    =   $_POST['isi'];
    $nama   =   $_POST['nama'];
    $idpost = $_POST['idpost'];
    
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
        $stmt = $db->prepare('UPDATE post SET nama = :nama, judul = :judul, isi = :isi WHERE idpost = :idpost') ;
        $stmt->execute(array(
            ':nama' => $nama,
            ':judul' => $judul,
            ':isi' => $isi,
            ':idpost' => $idpost
        ));

        //redirect to index page
        header("location:../tampil/template.php?idpost=$idpost&status=updated");
        exit;

    }
}
?>
<html>
<head>
    <title>edit post</title>
    <link rel="stylesheet" href="edit.css">
    <script src="../style/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php include('../head/header1.php'); ?>
    <div class="edit">
        <form method='post'>
            <input type='hidden' name='idpost' value='<?php echo $row['idpost'];?>'>

            <p><label>Nama</label><br />
                <input type='text' name='nama' value='<?php echo $row['nama'];?>'></p>

            <p><label>Judul</label><br />
                <input type="text" name='judul' value="<?php echo $row['judul'];?>"></p>

            <p><label>Isi</label><br />
                <textarea name='isi' cols='60' rows='10'><?php echo $row['isi'];?></textarea></p>

            <p><input type='submit' name='submit' value='Update'></p>
    </div>
</form>
</body>
</html>