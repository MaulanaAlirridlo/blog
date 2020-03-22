<?php
    include('../head/header1.php');
?>
<!DOCTYPE html>
<head>
    <title>Lupa Password</title>
    <link rel="stylesheet" href="lupa.css">
    <link rel="icon" href="../logo.png">
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
        <br>
        <?php if(isset($_SESSION['terkirim'])):?>
            <div class="ok">
                <?php
                    echo $_SESSION['terkirim'];
                    unset($_SESSION['terkirim']);
                ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['error'])):?>
            <div class="error">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>