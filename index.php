<?php
    include('connection.php');
    session_start();
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
     } else {
         $user = false;
     }
$stmt = $db->query("SELECT * FROM post");
$data = [];
while($item =  $stmt->fetch(PDO::FETCH_OBJ)) {
  $data[] = $item;
}
if(isset($_GET['delpost'])){ 

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
                <a href="./post/edit-post.php?id=<?php echo $item->idpost?>">Edit</a>
                <a href="javascript:delpost('<?php echo $item->idpost;?>','<?php echo $item->judul;?>')">Delete</a>
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
    <script language="JavaScript" type="text/javascript">
function delpost(id, title)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'index.php?delpost=' + id;
  }
}
</script>
</body>

</html>