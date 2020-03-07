<?php
    include('../connection.php');
    use PHPMailer\ PHPMailer\ PHPMailer;
    use PHPMailer\ PHPMailer\ SMTP;
    use PHPMailer\ PHPMailer\ Exception;
    if(isset($_POST["submit"])){
        if(empty($_POST['user'])){
            echo('isien sek gan');
        }else{
            $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
            $stmt->bindValue(':email', $_POST['user']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                // Import PHPMailer classes into the global namespace
                // These must be at the top of your script, not inside a function
                //generate token
                function get_token($panjang) {
                    $token = array(
                        range(1, 9),
                        range('a', 'z'),
                        range('A', 'Z')
                    );

                    $karakter = array();
                    foreach($token as $key => $val) {
                        foreach($val as $k => $v) {
                            $karakter[] = $v;
                        }
                    }

                    $token = null;
                    for ($i = 1; $i <= $panjang; $i++) {
                        // mengambil array secara acak
                        $token.= $karakter[rand($i, count($karakter) - 1)];
                    }

                    return $token;
                }
                $token = get_token(60);
                $email = $user['email'];
                $iduser = $user['iduser'];
                $dibuat = date('Y-m-d');
                $link = "localhost/blog/lupa/newpass.php?t=$token";
                $sql = "INSERT INTO token (token, iduser, dibuat) VALUES (:token, :iduser, :dibuat)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':token', $token);
                $stmt->bindValue(':iduser', $iduser);
                $stmt->bindValue(':dibuat', $dibuat);

                $result = $stmt->execute();


                if ($result) {
                    // panjang 15 karakter
                    // echo get_token(15);

                    // Load Composer's autoloader
                    // require 'vendor/autoload.php';
                    require '../phpmailer/src/PHPMailer.php';
                    require '../phpmailer/src/SMTP.php';
                    require '../phpmailer/src/Exception.php';

                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    //tambahan bug fix
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    try {
                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'maulana.alirridlo0@gmail.com';                     // SMTP username
                        $mail->Password   = 'asd081357';                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        // //Recipients
                        $mail->setFrom('maulana.alirridlo0@gmail.com', 'admin');
                        $mail->addAddress("$email", 'user');     // Add a recipient
                        // $mail->addAddress('ellen@example.com');               // Name is optional
                        // $mail->addReplyTo('info@example.com', 'Information');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');

                        // // Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                        // Content
                        $mail -> isHTML(true); // Set email format to HTML
                        $mail->Subject = 'Password Recovery';
                        $mail->Body    = "Anda menerima link untuk membuat password baru. tolong abaikan jika ini bukan akun ada <br> <a href='$link'>silahkan klik disini</a>";
                        $mail->AltBody = "$link";

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    header('location:terkirim.php');
                } else {
                    echo('error');
                };
            }else{
                echo('email tidak terdaftar');
            }
        }
    }
?>
