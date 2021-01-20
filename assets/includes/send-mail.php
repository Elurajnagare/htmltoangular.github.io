<?php 
include_once('class.phpmailer.php');

 require_once('class.smtp.php');

if ( isset( $_POST[ 'g-recaptcha-response' ] ) && empty( $_POST[ 'g-recaptcha-response' ] ) ) {
  $privatekey = '6Ldz1JAUAAAAABHoiy5VhL6t0VJqm8w4xxq2RWUe';
  $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $privatekey . '&response=' . $_POST[ 'g-recaptcha-response' ] );
  $responseData = json_decode( $verifyResponse );
  if ( $responseData->success == false ) {
    echo 'Invalid reCAPTCHA';
  }
} else {
  //print_r($_POST);
  $strName = strip_tags($_POST['strName']);
  $intPhone = strip_tags($_POST['intPhone']);
  $strEmail = strip_tags ($_POST['strEmail']);
  $strLocation = strip_tags ($_POST['strLocation']);
  $strMessage = strip_tags ($_POST['strMessage']);
  $companyName = "John A Probert Sons & Grandsons";
  $companyLogo = "http://obmproof.co.uk/johnaprobert/images/John-A-Probert-Sons-&-Grandsons.png";

  $subject = "Contact Form from ".$companyName;

  $mail = new PHPMailer();
  // $mail->IsSMTP();
  $mail->Host       = "mail.gmail.com"; // SMTP server example
  //$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Port       = 465;            // set the SMTP port for the GMAIL server
  $mail->SMTPSecure = 'ssl';                 
  $mail->SMTPDebug = 2;
  $mail->Username   = "onebasemedia@gmail.com"; // SMTP account username example
  $mail->Password   = "E3356!_234!";        // SMTP account password example
  $mail->From = $strEmail;
  $mail->FromName = $strName;
  $mail->SetFrom($strEmail , $strName, 0);
  /*$mail->AddAddress('');
  $mail->AddCC('obmcontactforms@gmail.com');*/
   $mail->AddAddress('obmcontactforms@gmail.com');
  // $mail->AddReplyTo($strEmail);

  $mail->IsHTML(true);
  $mail->Subject = $companyName.' || Get a Quote';
  $mail->Body = '<tr>';
  $mail->Body .= '<tr>
                  <td align="center" height="60px;" style="background:#f0c951;text-transform:capitalize;font-size:20px;color:#1f1f1f;font-weight:bold; padding:0 20px;">John A Probert Sons & Grandsons || Request A Quote
                  </td>
                </tr>';
  $mail->Body .= '<tr>
                  <td style="padding: 20px 15px 20px;background: #f6f6f6;">
                      <h1 style="font-size: 17px; color: #262626; font-weight: bold; margin: 0px !important">Hello Admin,</h1>
                      <p style="font-size: 15px; color: #202020; margin:10px 0; line-height: 22px">You have received new enquiry from <span style="color:#1f5fa4;font-weight: bold; text-transform: uppercase;">'.$strName.'</span> <span style="font-weight: bold;">'.$strEmail.'</span><br/>Below are the details:</p>
                   </td>
              </tr>';
            $mail->Body .= '<tr>
              <td style="padding: 0 15px 15px;background: #f6f6f6;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 14px;line-height: 22px;border: solid 1px #ddd;background-color: #fff;">';
                  $mail->Body .= '<tr>
                                    <td width="170px" style="color: #000;font-weight: bold;border: solid 1px #ddd;border-left: 0;border-top: 0;padding: 5px 10px;">Name:</td>
                                    <td style="border: solid 1px #ddd;border-left: 0;border-right: 0;border-top: 0;padding: 5px 10px;font-weight: normal;">'.$strName.'</td>
                                  </tr>';
                  
                  $mail->Body .= '<tr>
                                    <td width="170px" style="color: #000;font-weight: bold;border: solid 1px #ddd;border-left: 0;border-top: 0;padding: 5px 10px;">Email:</td>
                                    <td style="border: solid 1px #ddd;border-left: 0;border-right: 0;border-top: 0;padding: 5px 10px;font-weight: normal;">'.$strEmail.'</td>
                                  </tr>';
                  
                  $mail->Body .= '<tr>
                                    <td width="170px" style="color: #000;font-weight: bold;border: solid 1px #ddd;border-left: 0;border-top: 0;padding: 5px 10px;">Phone:</td>
                                    <td style="border: solid 1px #ddd;border-left: 0;border-right: 0;border-top: 0;padding: 5px 10px;font-weight: normal;">'.$intPhone.'</td>
                                  </tr>';
                  $mail->Body .= '<tr>
                                    <td width="170px" style="color: #000;font-weight: bold;border: solid 1px #ddd;border-left: 0;border-top: 0;padding: 5px 10px;">Location:</td>
                                    <td style="border: solid 1px #ddd;border-left: 0;border-right: 0;border-top: 0;padding: 5px 10px;font-weight: normal;">'.$strLocation.'</td>
                                  </tr>';
                                      
                  $mail->Body .= '<tr>
                                    <td width="170px" style="color: #000;font-weight: bold;border: solid 1px #ddd;border-left: 0;border-top: 0;padding: 5px 10px;">Message:</td>
                                    <td style="border: solid 1px #ddd;border-left: 0;border-right: 0;border-top: 0;padding: 5px 10px;font-weight: normal;">'.$strMessage.'</td>
                                  </tr>';
                $mail->Body .= '</table>';
              $mail->Body .= '</td>';
            $mail->Body .= '</tr>';
            $mail->Body .= '<tr>
              <td style="background:#3c6f36; height: 70px">
                <p style="text-align: center;font-size: 15px; color: #fff;">Thank you!!</p>             
              </td>
            </tr>  ';       
          $mail->Body .= '</table>        
        </td>
      </tr>
    </tbody>
  </table>';

  if(!$mail->Send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
  }else{
   echo 'mailsuccess';
  }

  // Thank you mail
  $mail2 = new PHPMailer();
  // $mail2->IsSMTP();
  $mail2->Host       = "mail.gmail.com"; // SMTP server example
  //$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail2->SMTPAuth   = true;                  // enable SMTP authentication
  $mail2->Port       = 465;             // set the SMTP port for the GMAIL server
  $mail2->SMTPSecure = 'ssl';                 
  $mail2->SMTPDebug = 2;
  $mail->Username   = "onebasemedia@gmail.com"; // SMTP account username example
  $mail->Password   = "E3356!_234!";        // SMTP account password example
  $mail2->From = $strEmail;
  $mail2->FromName = $strName;

  $mail2->SetFrom('' , $companyName, 0);
  $mail2->AddAddress($strEmail, $strName); 

  $mail2->IsHTML(true);
  $mail2->Subject = 'Thank you for contacting us || '.$companyName;
  $mail2->Body = '<table style="max-width: 640px; width: 100%; margin: 30px auto; border: solid 1px #dfdfdf" width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>      
              <td style="background: #fff; font-family:"Verdana", Myriad Pro, "Gill Sans", "Gill Sans MT", "DejaVu Sans Condensed", Helvetica, "sans-serif" ">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody><tr>
                                <td style="background:#3c6f36" height="120px;" align="center"><img style="
      max-width:210px;" src="'.$companyLogo .'" alt=" '.$companyName.'"></td>
                          </tr>
                          <tr style="background: #f6f6f6;">
                                <td style="padding: 50px; text-align: center;">
                                      <h1 style="font-size: 23px; color: #262626; font-weight: bold; line-height: 34px; margin-bottom: 50px">Thank you for contacting '.$companyName.', we will be back in touch soon!</h1>

                                      <p style="font-size: 15px; color: #202020;">Dear  <span style="text-decoration: underline ; font-weight: bold; text-transform: uppercase;">'.$strName.', </span></p>
                                      <p style="font-size: 15px; color: #202020;margin: 0 40px;line-height: 22px;">We have received your message and would like to thank you for writing to us. Our Customer Services team will be in touch with you directly.</p>
                                </td>
                          </tr>

                          <tr>
                                <td style="background:#f0c951; height: 70px">
                                      <p style="text-transform: uppercase; text-align: center;font-size: 15px; color: #1f1f1f;">&copy; Copyright 2019 <!-- IF POSSIBLE ADD CURRENT YEAR  --> <span style="text-decoration: underline; font-weight: bold; text-transform: uppercase;">'.$companyName.'</span></p>
                                </td>
                          </tr>             
                    </tbody></table>        
              </td>
            </tr>
          </tbody>
        </table>';

  if(!$mail2->Send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail2->ErrorInfo;
  exit;
  }
   echo 'mailsuccess';
}
?>