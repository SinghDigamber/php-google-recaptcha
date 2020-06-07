<?php
    if(isset($_POST["send"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        
        // Form validation
        if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){

            // reCAPTCHA validation
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

                // Google secret API
                $secretAPIkey = 'Your_Secret_Key';

                // reCAPTCHA response verification
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

                // Decode JSON data
                $response = json_decode($verifyResponse);
                    if($response->success){

                        $toMail = "johndoe@gmail.com";
                        $header = "From: " . $name . "<". $email .">\r\n";
                        mail($toMail, $subject, $message, $header);

                        $response = array(
                            "status" => "alert-success",
                            "message" => "Your mail have been sent."
                        );
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Robot verification failed, please try again."
                        );
                    }       
            } else{ 
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Plese check on the reCAPTCHA box."
                );
            } 
        }  else{ 
            $response = array(
                "status" => "alert-danger",
                "message" => "All the fields are required."
            );
        }
    }  
?>