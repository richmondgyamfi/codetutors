<?php

class Functions extends class_PHPMailer{
    private $db;
	private $file_type = ['image/jpg','image/png','image/jpeg','application/pdf'];


    public function __construct(){
        $this->db = new Database;
    }

    public function mailerfunction($data){
        require APPROOT2.'/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(EMAIL, 'Selected for interview');
        $mail->addAddress('richmond.nketia@ucc.edu.gh');     // Add a recipient
        $mail->addReplyTo(EMAIL);

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the<h1> HTML message</h1> body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function single_fileupload($staff_files){
        $files = preg_replace('/\s+/', '', $staff_files['name']);
        $tempfile = $staff_files['tmp_name'];
        $typefile = $staff_files['type'];
        $timestamp = time()+date("Z");
        $timetoday = gmdate("Ymd-His",$timestamp);
            if (in_array(!empty($typefile), $this->file_type)) {
                // var_dump($files);
                // die();
                if($tempfile != ""){
                    $newfilePath = APPROOT2."/public/images/tutor_files/".$timetoday.$files;
                    $file1 = move_uploaded_file($tempfile, $newfilePath);
                    $newfilePath = $newfilePath;
                    if($file1){
                        // echo 'ps';
                        // die();
                        return $newfilePath;
                    }
                }else{
                    $newfilePath1 = "";
                    return $newfilePath1;
                }
            }else{
                $newfilePath1 = "";
                return $newfilePath1;
            }
        return $newfilePath;
    }

    

}
    ?>