<?php
    include('../head/header1.php');
?>
<!DOCTYPE html>
<head>
    <title>Lupa Password</title>
    <link rel="stylesheet" href="lupa.css">
</head>
<body>
    <div class="parent">
        <div class="child1">
            <form action="kirim-email.php" method="post">
                <div class="input">
                    <label>Masukkan Email Anda</label><br>
                    <input type="text" name="user">
                </div>
                <div clas="submit">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>