<?php

    require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // passing true in constructor enables exceptions in PHPMailer
    $mail = new PHPMailer(true);
    
      define("RECAPTCHA_V3_SECRET_KEY", '<KEY>');

  $token = $_POST['token'];
  $action = $_POST['action'];

  // call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

//echo $response."<br/>";
//echo "success : ". $arrResponse["success"] ." <br/> action : ". $arrResponse["action"] . " <br/> score : ". $arrResponse["score"];
//echo "Token : ". $token ." <br/> action : ". $action;
//exit;

  if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) 
  {
    // Form inputs
    $name = $_POST['name']; 
    $email       = $_POST['email']; 
    $phone      = $_POST['phone']; 
    $message  = $_POST['message'];  

    //$from_email = $email; //sender email
    //$from_email = "noreply@misoftservices.com"; //sender email
    //$recipient_email =  "";
    //$recipient_email ="rockgk@gmail.com";
    $subject  = 'Contact Details - '.$phone; //subject of email
    
    $body_message = '<table style="font-family: arial, sans-serif;border-collapse: collapse;width:500px;">
<tr><td colspan="2"style="text-align:center;background-color:#0b76ba;color:#ffffff;"><h3 style="text-align:center;background-color:#0b76ba;color:#ffffff;">Contact Details</h3></td></tr>
    <tr>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Name</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$name.'</td>
    </tr>
    <tr style="background-color: #dddddd;">
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$email .'</td>
    </tr>
     <tr>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Mobile Number</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$phone .'</td>
    </tr>
    <tr style="background-color: #dddddd;">
        <td style="text-align: left;padding: 8px;">Message</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$message .'</td>
    </tr>  
    </table><br>
            Regards,<br>
        <h4 style="background: unset;">V2Legal.<h4>';
            try {   
                // Server settings
                $mail->SMTPDebug = false;
                $mail->isSMTP();
                //$mail->Host = 'smtp.gmail.com';
                $mail->Host = 'v2legal.com';
                //$mail->Host = 'mocha3031.mochahost.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->Username = 'info@v2legal.com'; // YOUR gmail email
                $mail->Password = '<password>'; // YOUR gmail password

                // Sender and recipient settings
                $mail->setFrom('info@v2legal.com', 'V2Legal');
                $mail->addAddress('v2legalfirm@gmail.com');
                //$mail->addAddress('sureshhmax@gmail.com');
                $mail->addBCC('suresh@binaryclouds.in');
                $mail->addBCC('info@horizonsoftnet.com');
                //$mail->addReplyTo('', 'Sender Name'); // to set the reply to

                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body_message;
                $mail->AltBody = $body_message;
                //$mail->AddAttachment($_FILES['myfile']['tmp_name'],$_FILES['myfile']['name']);    
                $mail->send();
                ?>

                <script language="javascript" type="text/javascript">
                    alert('Thank you for Contacting. We will contact you shortly.');
                    window.location = 'index.php';
                </script>


                <?php    
            } catch (Exception $e) {
                //echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                ?>
                    <script language="javascript" type="text/javascript">
                        alert('Error in sending email. Please try again later');
                        window.location = 'contact.php';
                    </script>
                <?php
            } 
 }
    else
    {
     ?>
        <script type="text/javascript">
        alert("Captcha verification failed, Please try again!");
        window.location.href='contact.php';
        </script>
     <?php exit;     
  }
?>