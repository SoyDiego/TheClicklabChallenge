<?php
//-----------ENVIO DE MAIL--------------------
header('Content-Type: text/html; charset=utf-8');
//Importamos las variables del formulario de contacto
@$name = htmlspecialchars($_POST['name']);
@$email = htmlspecialchars($_POST['email']);
@$subject = htmlspecialchars($_POST['subject']);
@$message = htmlspecialchars($_POST['message']);

//Validamos que los campos no esten vacios.
if ($name == '' || $email == '' || $subject == '' || $message == '') {
    echo '<div id="respuesta2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="text-center">
                                <i class="text-center fa fa-exclamation-triangle fa-4x"></i>
                            </div>
                            <div class="text-center">
                                <strong>Please, fill the fields. &#161;Thanks!</strong>
                            </div>
                        </div>    
                    </div>
                </div>';
} else {
    //Sino estan vacios, se envía...
    //Preparamos el mensaje de contacto
    $header = "From: $email\n" //La persona que envia el correo
        . "Reply-To: $email\n";
    $email_to  = "yourEmail@example.com"; //cambiar por tu email
    $content = "A message has been sent from the XYZ Website\n" . "\n" . "Name: $name\n" . "Email: $email\n" . "Message: $message\n" . "\n";
    //Enviamos el mensaje y comprobamos el resultado
    if (@mail($email_to, $subject, $content, $header)) {

        //Si el mensaje se envía muestra una confirmación
        echo '<div id="respuesta2" class="modal fade envioCorrecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>

                        <div class="text-center">
                            <i class="fa fa-check-circle fa-4x"></i>
                        </div>

                        <div class="text-center">
                            <strong>Your message has been sent correctly. &#161;Thanks!</strong>
                        </div>

                    </div>    
                </div>
            </div>';
    } else {
        //Si el mensaje no se envía muestra el mensaje de error
        echo '<div id="respuesta2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="text-center">
                                <i class="text-center fa fa-exclamation-triangle fa-4x"></i>
                            </div>
                            <div class="text-center">
                                <strong>El envío ha fallado, intentelo nuevamente. &#161;Muchas Gracias!</strong>
                            </div>
                        </div>    
                    </div>
                </div>';
    }
}
