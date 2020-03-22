<?php
    include('connection.php');
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
     } else {
         $user = false;
     }
$stm = $db->query("SELECT * FROM post LIMIT 5");
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
    <link rel="icon" href="logo.png">
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
                <div class="text"><h1><?=substr($siap['judul'],0,48);?></h1></div>
            </a>
        </div>
        <?php endwhile; ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div class="conten">
        <h1>recent</h1>
        <?php foreach($data as $item): ?>
        <a href="./tampil/template.php?idpost=<?= $item->idpost ?>" class="simpen-link">
            <div class="card">
                <img src='uploads/<?="$item->nama_gambar.$item->format_gambar"?>' class="conten-pict">
                <h2 class="title"><?= substr($item->judul, 0, 30)?><?='...'?></h2>
                </a>
                <?php if($user['iduser']==$item->iduser):?>
                <div class="dropdown1">
                    <button class="dropbtn1"><img src="panah.png"></button>
                    <div class="dropdown-content1">
                        <a href="./post/edit-post.php?id=<?php echo $item->idpost?>">Edit</a>
                        <a href="javascript:delpost('<?php echo $item->idpost;?>','<?php echo $item->judul;?>','<?= "$item->nama_gambar.$item->format_gambar"?>')">Delete</a>
                    </div>
                </div>
                <?php endif;?>
                <a href="./tampil/template.php?idpost=<?= $item->idpost ?>" class="simpen-link">
                    <div class="card-body">
                        <p class="body"><?= substr($item->isi, 0, 100)?><?='...'?></p>
                    </div><br>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="video">
        <h1>VIDEO</h1>
        <h3>Ina Wroldsen - Strongest (Lyric Video)</h3>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/X_5Qz63QKAk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="videoyt"></iframe>
    </div>
    <br>
    <?php
        $stmt = $db->query("SELECT * FROM post ORDER BY RAND() LIMIT 1");
        while($siap = $stmt->fetch()): 
    ?>
        <div class="random">
        <a href="./tampil/template.php?idpost=<?= $siap['idpost'] ?>" class="link">
            <img src='uploads/<?="$siap[nama_gambar].$siap[format_gambar]"?>' class="random-pict">
            <div class="random-text"><br><br><?=$siap['judul']?><br></div>
        </a>
            <h3><?= $siap['nama'] ?></h3>
        </div>
    <?php endwhile;?>
    <br>
    <div class="allpost">
        <?php
            $stmt = $db->query("SELECT * FROM post");
            while($siap = $stmt->fetch(PDO::FETCH_ASSOC)): 
        ?>
            <div class="isiallpost">
            <a href="./tampil/template.php?idpost=<?= $siap['idpost'] ?>" class="link">
                <img src='uploads/<?="$siap[nama_gambar].$siap[format_gambar]"?>' class="allpost-pict">
                <div class="allpost-text"><?=$siap['judul']?><br></div>
            </a>
                <h4><?= $siap['nama'] ?></h4>
            </div>
        <?php endwhile;?>
    </div>
    <div class="pelengkap">
        <img src="h3h3.png"> <br>
        <h1>Sakuraaa-chaaaan</h1>
    </div>
    <div class="allpost2">
        <?php
            $stmt = $db->query("SELECT * FROM post");
            while($siap = $stmt->fetch(PDO::FETCH_ASSOC)): 
        ?>
            <div class="isiallpost2">
            <a href="./tampil/template.php?idpost=<?= $siap['idpost'] ?>" class="link">
                <img src='uploads/<?="$siap[nama_gambar].$siap[format_gambar]"?>' class="allpost-pict2"> <br>
                <h4 class="allpost-short-text2"><?= $siap['nama'] ?></h4>
                <div class="allpost-text2"><?=$siap['judul']?><br></div>
            </a>
            </div>
        <?php endwhile;?>
    </div>
    <div class="rekomendasi">
        <h1>rekomendasi</h1>
        <?php
        $stmt = $db->query("SELECT * FROM post ORDER BY RAND() LIMIT 1");
        while($siap = $stmt->fetch()): 
        ?>
            <div class="random1">
            <a href="./tampil/template.php?idpost=<?= $siap['idpost'] ?>" class="link">
                <img src='uploads/<?="$siap[nama_gambar].$siap[format_gambar]"?>' class="random-pict1">
                <h3><?= $siap['nama'] ?></h3>
                <div class="random-text1"><br><br><?=$siap['judul']?><br></div>
            </a>
            </div>
        <?php endwhile;?>
    </div>
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
<?php include('foot/footer.html') ?>
</body>

</html>