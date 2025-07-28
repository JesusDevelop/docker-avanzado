<?php 
include("conexion.php"); // CONECTAR CON LA BASE DATOS
//DECLARO VARIABLES PHP PARA CAPTURAR DATOS PROVENIENTES DEL FORMULARIO DE CONTACTO CON EL METODO POST
$nombre=$_POST['name'];
$pais=$_POST['pais'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];
$fecha=date("Y-m-d H:i:s");
$contenido_emailCliente="Hola estimado ".$nombre.",\n\nRecibimos su mensaje con el contenido ".$mensaje." exitosamente en la brevedad nuestro equipo le contactara para responder su requerimiento,\n\nCordialmente\nStarterPack\nEmail: contacto@starterpack.tech\nhttps://starterpack.tech/";
$email_infoCliente="Se ha registrado un cliente con la siguiente informacion: nombre: ".$nombre.", tlfn: ".$telefono." , email: ".$email." , mensaje: ".$mensaje." ";
//$resultado = $mysqli->query("INSERT INTO contacto(nombre,pais,email,telefono,mensaje,fecha)VALUES('".$nombre."','".$pais."','".$email."','".$telefono."','".$mensaje."','".$fecha."')");



if(isset($_POST["g-recaptcha-response"])){
      $ip = $_SERVER["REMOTE_ADDR"];
      $captcha = $_POST["g-recaptcha-response"];
      $secretkey = "6LeNgHgqAAAAAHfbAy86ZkB7ssWJ8a8qevRIR3wF";
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
   
      $jsonResponse= json_decode($response, TRUE);
     
   
      if(!$jsonResponse["success"]){   
         echo '<script>alert("error al completar el captcha, intentelo nuevamente"); </script>';
         echo '<script>location.href ="../index.php?res=2#contact";</script>';
               
      }
      else{
         $resultado = $mysqli->query("INSERT INTO contacto(nombre,pais,email,telefono,mensaje,fecha)VALUES('".$nombre."','".$pais."','".$email."','".$telefono."','".$mensaje."','".$fecha."')");
         if($resultado)
          {
       //SI SALE CORRECTAMENTE REDIRECCIONO AL INDEX
       // echo "Se registro correctamente el registro en la BD";
        // echo '<script>alert("Se registro correctamente."); </script>'; sol 1 de mensaje
         

        $asunto = "Contacto StarterPack";
        $headers = "From: contacto@starterpack.tech\r\n"; // Cambia esto a la dirección de correo del remitente
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Tipo de contenido
      
        // Enviar el correo
               if (mail($email, $asunto, $contenido_emailCliente, $headers)) 
               { 

               echo '<script>location.href ="../index.php?res=1#contact";</script>';
               }
               else
               {
                   echo '<script>location.href ="../index.php?res=2#contact";</script>';
               }

      }  else
      {
         echo '<script>location.href ="../index.php?res=2#contact";</script>';
      }
   }
}

   



// if(($resultado) and ($atributos['success']))
// {
//     //SI SALE CORRECTAMENTE REDIRECCIONO AL INDEX
//     // echo "Se registro correctamente el registro en la BD";
//      // echo '<script>alert("Se registro correctamente."); </script>'; sol 1 de mensaje
      

//      $asunto = "Contacto StarterPack";
//      $headers = "From: contacto@starterpack.tech\r\n"; // Cambia esto a la dirección de correo del remitente
//      $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Tipo de contenido
     
//      // Enviar el correo
//      if (mail($email, $asunto, $contenido_emailCliente, $headers)) 
//      { 

//         echo '<script>location.href ="../index.php?res=1#contact";</script>';
//      }
//      else
//      {
//         echo '<script>location.href ="../index.php?res=2#contact";</script>';
//      }

// }else
// {
//    echo '<script>location.href ="../index.php?res=2#contact";</script>';
// }

?>