<?php
    include('connection.php');
    session_start();
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
     } else {
         $user = false;
     }
$stm = $db->query("SELECT * FROM post");
$data = [];
while($item =  $stm->fetch(PDO::FETCH_OBJ)) {
  $data[] = $item;
}
if(isset($_GET['delpost'])){ 
    $gambar=$_GET['gambar'];
    $delpict=unlink("uploads/$gambar");
    if(!($delpict)){
        echo '<script>setTimeout(function () { swal.fire("ERROR!", "Terjadi Error saat Menghapus Gambar!")}, 150);</script>';
    }
    $stmt = $db->prepare('DELETE FROM post WHERE idpost = :idpost') ;
    $stmt->execute(array(':idpost' => $_GET['delpost']));

    header('Location: index.php?action=deleted');
    exit;
} 

?>
<html>

<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <?php include('head/header.php');?>
    <?php
        if(isset($_GET['action'])){ 
            echo '<h3>Post '.$_GET['action'].'.</h3>'; 
        }
    ?>

    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <?php
            $stmt = $db->query("SELECT * FROM post ORDER BY RAND() LIMIT 3");
            while($siap = $stmt->fetch()): 
        ?>
        <div class="mySlides fade">
            <a href="./tampil/template.php?idpost=<?= $siap['idpost'] ?>" class="link">
                <img src='uploads/<?="$siap[nama_gambar].$siap[format_gambar]"?>' class="slide-pict">
                <div class="text"><?=$siap['judul']?></div>
            </a>
        </div>
        <?php endwhile; ?>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div class="conten">
        <?php foreach($data as $item): ?>
        <a href="./tampil/template.php?idpost=<?= $item->idpost ?>" class="simpen-link">
            <div class="card">
                <h2 class="title"><?= substr($item->judul, 0, 60)?><?='...'?></h2>
        </a>
        <?php if($user['iduser']==$item->iduser):?>
        <div class="dropdown1">
            <button class="dropbtn1"><img src="panah.png"></button>
            <div class="dropdown-content1">
                <img src='uploads/<?="$item->nama_gambar.$item->format_gambar"?>' class="conten-pict">
                <a href="./post/edit-post.php?id=<?php echo $item->idpost?>">Edit</a>
                <a href="javascript:delpost('<?php echo $item->idpost;?>','<?php echo $item->judul;?>','<?= "$item->nama_gambar.$item->format_gambar"?>')">Delete</a>
            </div>
        </div>
        <?php endif;?>
        <a href="./tampil/template.php?idpost=<?= $item->idpost ?>" class="simpen-link">
            <div class="card-body">
                <p class="body"><?= substr($item->isi, 0, 100)?><?='...'?></p>
            </div>
    </div>
    </a>
    <?php endforeach; ?>
    </div>
    <?php include('foot/footer.html') ?>
    <script language="JavaScript" type="text/javascript">
function delpost(id, title, gambar)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'index.php?delpost=' + id + '&gambar=' + gambar;
  }
}
</script>
<script src="js.js"></script>
</body>

</html>