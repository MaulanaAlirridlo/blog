<?php

$data  = [];

for($i = 0; $i< 20; $i++) {
    $data[] =  (object) [
        'id' => $i,
        'comment' => 'Komentar '. $i
    ];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .comment-body:checked + .card-body  {
            display: block !important;
        }
    </style>
</head>
<body>


<div class="container">
        
   <div class="col-row">
       <div class="col-md-6 mx-auto">
       <?php
        foreach($data as $com):
        ?>
            <div class="card mt-3 shadow">
                <div class="card-header d-flex">
                    <h5><?= $com->comment ?></h5>
                    <label for="comment-<?= $com->id ?>" class="btn btn-info ml-auto">Edit</label>
                </div>
                <input type="checkbox" class="comment-body d-none" id="comment-<?= $com->id ?>">
                <div class="card-body d-none">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $com->id ?>">
                            <textarea name="coment" class="form-control"><?= $com->comment ?></textarea>
                            <button class=" btn btn-info px-4 mt-4 " type="submit">Save</button>
                        </form>
                </div>
            </div>
        <?php
        endforeach;
        ?>
       </div>
   </div>
</div>
    
</body>
</html>