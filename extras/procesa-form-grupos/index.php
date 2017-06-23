<?php
/*
// Procesa el formulario de la seccion GRUPOS del portal
// Pedro - 2016
*/
    $to = "El Misti Hostels <info@elmistihostels.com>"; // this is your Email address
    $from = $_POST['Email']; // this is the sender's Email address
    $first_name = $_POST['Nome'];
    $last_name = $_POST['Sobrenome'];
    $subject = "Contato Formulario Grupos Website elmistihostels.com";
    $message = getInputs();

    $headers   = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=utf-8";
    $headers[] = "From: " . $first_name . " " . $last_name .  "<" . $from . ">";
    $headers[] = "Reply-To: " . $first_name . " " . $last_name .  "<" . $from . ">";
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/".phpversion();

    mail($to,$subject,$message,implode("\r\n", $headers));
    
    echo "<script>alert('Mail Sent. Thank you " . $first_name . ", we will contact you shortly.');window.location.href='/';</script>";
    

    function getInputs(){
        /*
        // Procesa todos los valores recibidos por $_POST[] como name : value
        */
        $body;
        foreach ($_POST as $key => $value){
            $body .= htmlspecialchars($key)." : ".htmlspecialchars($value)."<br>";    
        }
        return $body;
    }
?>