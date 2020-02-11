<!-- //pake foreach wajib oprek -->
<?php
    // $data =//ambil data dari database;
    //error
// $stmt = $db->query("SELECT * FROM post");
// $fetched=  $stmt->fetch(PDO::FETCH_OBJ);
// $data = [];
// while($item = $fetched) {
//   $data[] = $item;
    //succes
$stmt = $db->query("SELECT * FROM post");
$data = [];
while($item =  $stmt->fetch(PDO::FETCH_OBJ)) {
  $data[] = $item;
}

?>

<?php foreach($data as $item): ?>
<a href="tampilan.php?postid=<?= $item->id ?>" class="simpen-link">
    <div class="card">
        <div class="card">
            <img src="storagenya/<?= $item->image ?>" alt="">
        </div>
    
        <div class="card-body">
            <h2 class="tittle"><?= substr($item->tittle, 0, 50) ?></h2>
            <p class="body"><?= substr($item->text, 0, 100) ?></p>
        </div>
    </div>
</a>
<?php endforeach; ?>

<!-- //cmn gawe while -->
<?php while($siap = $stmt->fetch()): ?>
<a href="index.php?postid=<?= $siap['idpost'] ?>" class="simpen-link">
    <div class="card">
        <div class="card-body">
            <h2 class="tittle"><?= substr($siap['judul'], 0, 50) ?></h2>
            <p class="body"><?= substr($siap['isi'], 0, 200) ?><?= "..."?></p>
        </div>
    </div>
</a>
    <?php endwhile; ?>