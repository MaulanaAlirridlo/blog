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
    <div class="header">
        <img src="https://cdn.pixabay.com/photo/2018/03/13/20/23/cartoon-3223656_960_720.png" id="img1">
        <div id="akun">
            <?php
            if($user)  {
                echo "<div class='welcome'> $user[username] <br> $user[status] ";
                echo '<div class="dropdown">';
                echo '<button class="dropbtn"><img src="panah.png">';
                echo '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="logout.php">log out</a>';
                echo '</div>';
                echo '</div></div></div>';
            }
            else {
                echo '<div class="akun2"><a href="register/register.php"><button>sign up</button></a>';
                echo '<a href="login/login.html"><button>sign in</button></a></div>';
            }
            ?>
        </div>
    </div>
    <?php
        if(isset($_GET['action'])){ 
            echo '<h3>Post '.$_GET['action'].'.</h3>'; 
        } 
    ?>
    <div class="conten">
        <?php foreach($data as $item): ?>
        <a href="./tampil/template.php?idpost=<?= $item->idpost ?>" class="simpen-link">
            <div class="card">
                <h2 class="tittle"><?= substr($item->judul, 0, 50) ?></h2>
                <?php if($user):?>
                <div class="dropdown1">
                    <button class="dropbtn1"><img src="panah.png"></button>
                    <div class="dropdown-content1">
                        <a href="./post/edit-post.php?id=<?php echo $item->idpost?>">Edit</a>
                        <a href="javascript:delpost('<?php echo $item->idpost;?>','<?php echo $item->idpost;?>')">Delete</a>
                    </div>
                </div>
                <?php endif;?>
                <div class="card-body">
                    <p class="body"><?= substr($item->isi, 0, 100) ?></p>
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