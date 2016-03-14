<?php session_start();

          require 'PHPMailerAutoload.php';
     
          $mail = new PHPMailer;

          $receiver = $_POST["receiver"];
          $email = $_POST["email"];
          $sender = $_POST["sender"];
          $subject = $_POST["subject"];
          $msg = $_POST["msg"];

          $my_address = "adz13@pitt.edu";
          //$sendto_address = "webmaster@rehobothcemetery.org"
          //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.pitt.edu';                        // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'adz13@pitt.edu';                   // SMTP username
            $mail->Password = 'djs2020@mky';                      // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('adz13@pitt.edu', 'Andrew');
            $mail->addAddress($email, $receiver);                 // Add a recipient

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $subject;
            $mail->Body    = $msg;
            $mail->AltBody = $msg;

              if(!$mail->send()){
                
                $_SESSION['mail_error'] = "Message Not Sent. Mailer Error: " . $mail->ErrorInfo;

              }else{

                $_SESSION['mail_success']  = "File Has Been Sent To: " . $receiver . " From: " . $sender;

              }

          header('Location: ../../contactus.html');

?>
