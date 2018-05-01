<?php

$msg = null;

      if (isset($_POST["phpmailer"]))
     {
        
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $asunto =htmlspecialchars( $_POST["asunto"]);
    $mensaje = $_POST["mensaje"];
    //$adjunto = $_FILES["adjunto"];
        
        require "phpmailer/class.phpmailer.php";
    
          $mail = new PHPMailer;
		  
		  //indico a la clase que use SMTP
          $mail->IsSMTP();
		  
          //permite modo debug para ver mensajes de las cosas que van ocurriendo
          //$mail->SMTPDebug = 2;

		  //Debo de hacer autenticaci�n SMTP
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = "ssl";

		  //indico el servidor de Gmail para SMTP
          $mail->Host = "smtp.gmail.com";

		  //indico el puerto que usa Gmail
          $mail->Port = 465;

		  //indico un usuario / clave de un usuario de gmail
          $mail->Username = "examplearg@gmail.com";
          $mail->Password = "aexam1234";
       
          $mail->From = "tuemail@gmail.com";
        
          $mail->FromName = "Administrador";
        
          $mail->Subject = $asunto;
        
          $mail->addAddress($email, $nombre);
        
          $mail->MsgHTML($mensaje);
        
    
       /* if ($adjunto ["size"] > 0)
      {
           
          $mail->addAttachment($adjunto ["tmp_name"], $adjunto ["name"]);
   }*/
    
        
          if($mail->Send())
        {
    $msg= "En hora buena el mensaje ha sido enviado con exito a $email";
    }
        else
        {
    $msg = "Lo siento, ha habido un error al enviar el mensaje a $email";
    }
 }
?>


<!DOCTYPE html>
<html>
	<!-- Script para deslizar!-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"
		type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" >
		$(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;
            }
       }
   });
});


</script>
<style>

body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

/* Style the container/contact section */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
    float: left;
    width: 50%;
    margin-top: 6px;
    padding: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .column, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}

	.portada2 {	
	
	background: black;
	
	}

    .form {
        background-color: #45a049;
        margin:0;
        padding:0;
    }

</style>
	<head>
		<title>Open Design</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/index.css"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Slab" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Heebo:800" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css" media="screen">
		A:link {color: grey; text-decoration: none }
		A:hover {color: white; text-decoration: none }
		A:visited {color: grey; text-decoration: none }
		#link { color: grey; text-decoration: none }
		</style>

	</head>
	<body  onload="myFunction()" style="margin:0;"> 	

		<section id= "portada" class= "portada2"> <!--Portada-->

		<div class="header2" id=myHeader> <!--Header-->
	
					<div class="headerText"> <!--Header-->

								<figure class= "logotipo"> <!-- Logotipo -->
								<a href = index.html>
								<img src ="./Images/logo.png" width="80" height="55" />
								<a href  = index.html >  Open Design </a>
								</figure>
									<nav class = "menu"> <!--menu-->

									<ul>

											<li>
												<a href  = index.html style="font-size:20px;">  Home</a>
											</li>
											<li>
												<a href = #equipo style="font-size:20px;"> Equipo</a>
											</li>
                      <li>
                        <a href = #Actividades style="font-size:20px;"> Actividades</a>
                      </li>
                      <li>
												<a href = #tecnologias style="font-size:20px;"> Tecnologias</a>
											</li>
									   <li>
                        <a href = #price style="font-size:20px;">  Precios</a>
                      </li>
											
										</ul>

									</nav>


							</div>
					</div>
		
<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom"> 
<div class="container">
  <div style="text-align:center">
    <h2>Contactanos</h2>
    <p>Para mas informacion, Envia una solicitud</p>
  </div>
  <div class="row">
    <div class="column">
      <div id="map" style="width:100%;height:500px"></div>
    </div>
    <div class="column">
      <form method="POST" action="/send_contact.php" >
 		    <label for="fname">Nombre </label>
        <input type="text" id="fname" name="name" placeholder="Nombre y apellido..">
        <label for="email">Correo</label>
        <input type="text" id="email" name="email" placeholder="mail@ejemplo.com">
         <label for="fname">Asunto</label>
        <input type="text" id="asunto" name="asunto" placeholde r="Asunto">
        <label for="subject">Mensaje</label>
        <textarea id="subject" name="subject" placeholder="Escriba algo.." style="height:170px"></textarea>
        <input type="submit" value="Enviar Mensaje"name="submit">  
      </form>
    </div>
  </div>
</div>

<script>
// Initialize google maps
function myMap() {
  var myCenter = new google.maps.LatLng(51.508742,-0.120850);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 12};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script> 	
	</div>


<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

	</body>
</html>

		

