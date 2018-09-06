<?php
/* Mysql Database Connection */ 
$servername = "tesse001.mysql.guardedhost.com";
$dbname     = "tesse001_encuentro2018";
$username   = "tesse001_inecc";
$password   = "b4hH5-8uGs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} 
// Database connection successfull

// Parse form data
$regSelector = htmlspecialchars($_POST["regSelector"]);
switch($regSelector){
    case "regGeneral":
        /* Registro general */
        $dbTable            = "registro_general";
        $categoria          = "General";
        $nombre             = htmlspecialchars($_POST["nombre"]);
        $email              = htmlspecialchars($_POST["email"]);
        $dependencia        = htmlspecialchars($_POST["dependencia"]);
        $espersonal         = htmlspecialchars($_POST["espersonal"]);
        $genero             = htmlspecialchars($_POST["genero"]);
        $edad               = htmlspecialchars($_POST["edad"]);
        if(strlen($_POST["asistenciaprevia"]) < 1)
            $asistenciaPrevia = "No";
        else
            $asistenciaPrevia = "Si";

        $sql = "INSERT INTO $dbTable (nombre, email, dependencia, espersonal, genero, edad, asistenciaPrevia) 
                VALUES ('$nombre', '$email', '$dependencia', '$espersonal', '$genero', '$edad', '$asistenciaPrevia')";

        if ($conn->query($sql) === TRUE) {
            // "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        break;

    case "regPrensa":
        /* Registro prensa */
        $dbTable            = "registro_prensa";
        $categoria          = "Prensa / Medios";
        $nombre             = htmlspecialchars($_POST["nombre"]);
        $email              = htmlspecialchars($_POST["email"]);
        $medio              = htmlspecialchars($_POST["medioPrensa"]);
        $telOficina         = htmlspecialchars($_POST["telefonooficina"]);
        $telMovil           = htmlspecialchars($_POST["telefonomovil"]);
        $plataforma         = htmlspecialchars($_POST["PlataformaPrensa"]);
        $tema               = htmlspecialchars($_POST["medioPrensa"]);
        if(strlen($_POST["asistenciaprevia"]) < 1)
            $asistenciaPrevia = "no";
        else
            $asistenciaPrevia = "si";
        
        $sql = "INSERT INTO $dbTable (nombre, medio, email, tel_oficina, tel_movil, plataforma, temas, asistenciaPrevia) 
                VALUES ('$nombre', '$medio', '$email', '$telOficina', '$telMovil', '$plataforma', '$tema', '$asistenciaPrevia')";
        
        if ($conn->query($sql) === TRUE) {
            // "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        break;

    default:
        /* Ningun registro */
        header("refresh:0; url=index.html");
        echo "Redirigiendo a la página principal del evento...";
        exit;
}
?>

<!doctype html>
<html>
  <head>
    <title>Tercer Encuentro Nacional</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/eventprint.css" media="print">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="/script.js" defer></script>
  </head>
  
  <body>
    <!-- Header ----------------------->
    <header>
        <a href="index.html"><img class="logo" src="svg/inecc-blanco.svg" alt="INECC" /></a>
        
    <!--    <div class="options">
            <img  src="svg/home-page.svg" alt="Ícono de inicio" id="home-icon">
                <a href="#" id="icon-titles">
                    Inicio
                </a>
            <img  src="svg/social-rss.svg" alt="Ícono de blog" id="blog-icon">
                <a href="#" id="icon-titles">
                    Blog
                </a>
        </div>
        <div class="whole-searcher">
            <input class="form-control" type="search" placeholder="Búsqueda" id="searcher" >
                <img  src="svg/search.svg" alt="Ícono de búsqueda" id="search-icon">
        </div>  -->
    </header>
    
    <!-- Main -------------------------
    <main>
      <section class="leading">
        <img class="logo-mobile" src="svg/inecc-blanco.svg" alt="Logo de INECC" />
        <p id="event-title">
            <-- Contenido de JavaScript --
        </p>
        <p id="event-subtitle">
            <-- Contenido de JavaScript --
        </p>
        <p id="event-date">
            <-- Contenido de JavaScript --
        </p>
      
      
      <section class="big-button">
          <a href="registro-general.html"><button type="button" class="btn btn-success "><span class="big-button-text">REGISTRO GENERAL</span></button></a>
          <a href="registro-prensa.html"><button type="button" class="btn btn-success "><span class="big-button-text">REGISTRO DE PRENSA</span></button></a>
      </section>
      
      </section> -->
  
      <!--------- Botonera ------------
      <div class="buttons col-md-12 ">
          <div class = "row">
              
              !-- Botón de Biblioteca Digital  --
              <div class="digital-library-button col-3 container">
                 <div class = "dl-button-img">
                      <a href="#">
                          <img src = "svg/book.svg"  alt="Icono de Biblioteca Digital" >
                      </a>
                 </div>
                 <div class = "dl-button-text">
                     <div class = "dl-text-wrapper">
                          <a href="#">
                          BIBLIOTECA DIGITAL
                          </a>
                      </div>
                 </div>
                 <div class="float-clear"></div>
             </div>
                                
             !-- Botón de Cultura Climática --
             <div class="climate-culture-button col-3 container">
                 <div class ="cc-button-img">
                     <a href="#">
                         <img src = "svg/solar.svg" alt="Icono de Cultura Climática">
                    </a>
                 </div>
                 <div class= "cc-button-text">
                    <div class = "cc-text-wrapper">
                        <a href="#">
                            CULTURA CLIMÁTICA
                        </a> 
                    </div>
                </div>
                 <div class = "float-clear"></div>
             </div>
                                
            !-- Botón de Herramientas --
            <div class="tools-button col-3 container">
                <div class = "t-button-img">
                    <a href="#">
                        <img src = "svg/tools.svg"  alt="Icono de Herramientas"/>
                    </a>
                </div>
                <div class= "t-button-text">
                    <div class = "t-text-wrapper">
                        <a href = "#"> 
                            HERRAMIENTAS
                        </a>
                    </div>
                </div>
            </div>
                                
            !-- Botón de Información --
            <div class="help-button col-3 container">
                <div class = "h-button-img">
                    <a href="#">
                        <img src = "svg/information.svg" alt="Icono de Acercan del Sitio">
                        </a>
                </div>
                <div class= "h-button-text">
                    <div class = "h-text-wrapper">
                        <a href="#">
                            INFORMACIÓN 
                        </a>
                    </div>
                </div>
             </div>
            
        </div>   
    </div>            
    -- Fin de Botonera --> 


    
    <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Cultura Climática</a></li>
                <li class="breadcrumb-item"><a href="#">Eventos</a></li>
                <li class="breadcrumb-item active" aria-current="page">México ante el Cambio Climático</li>
          </ol>
    </nav> -->
    <div id="spacer" style="height: 80px;"></div>
    <div class="container">
      <div class="layout">
        <div class="col col-main" role="main">
          <h4 id="program">¡Tu registro ha sido exitoso!</h4>
          <p><strong>Nombre:</strong> <?php echo $nombre; ?><br>
          <strong>Correo electrónico:</strong> <?php echo $email; ?><br>
          <strong>Acceso:</strong> <?php echo $categoria; ?></p>
          <p>Gracias por registrarte como participante en el <strong>Tercer Encuentro Nacional “México ante el Cambio Climático”</strong> que se realizará del 17 al 20 de septiembre del 2018 en el <a href="https://goo.gl/maps/iSRmJj8C7xA2">Museo Interactivo de Economía</a>. 
          <ul class="link-items">
            <li><a href="index.html">Consulta el programa completo</a>.</li>
            <li><a href="agenda/3er-encuentro-cambio-climatico-programa-2018.pdf">Descarga la agenda del congreso</a>.</li>
            <li><a href="javascript:window.print();">Imprime tu registro</a>.</li>
          </ul>
          <p>Será necesario que presentes tu registro impreso para ingresar al evento.</p>
          <p><strong>NOTA:</strong> La asistencia a las actividades del lunes 17 de septiembre es sólo por invitación. Del 18 al 20 de septiembre el evento es abierto al público en general.</p>
        </div>
        <div class="col col-complementary" role="complementary">
          <img id="event-logo" src="png/logo-evento.png"/>
          <div class="event-venue">
            <h5>
              Sede
            </h5>
            <p>
                <i class="fa fa-map-marker"></i>
                <a href="https://goo.gl/maps/iSRmJj8C7xA2"> Museo Interactivo de Economía <br>
                Ciudad de México, México</a>
            </p>
          </div>
          <div class="event-date-location">
            <h5>
                Fecha
            </h5>
            <p>
                <i class="fa fa-calendar"></i> lunes 17
                al jueves 20 de septiembre de 2018
            </p>
          </div>
          <div class="event-contact">
            <h5>
                Contacto
            </h5>
            <p class="h-email-link">
              <i class="fa fa-envelope-o"></i>
              <a href="mailto:comunicacionsocial@inecc.gob.mx">
                comunicacionsocial@inecc.gob.mx
              </a>
            </p>
          </div>
          <div class="event-share">
            <h5>Agenda del evento</h5>
            <p class="h-email-link">
              <?php 
                    if($categoria == "Prensa / Medios"){
                        echo '<i class="fa fa-file-text-o"></i>
                        <a href="agenda/3er-encuentro-cambio-climatico-agenda_medios-2018.pdf">Agenda de evento para prensa en PDF</a><br>';
                    }
              ?>
              <i class="fa fa-file-text-o"></i>
              <a href="agenda/3er-encuentro-cambio-climatico-programa-2018.pdf">Agenda descargable como PDF</a>
            </p>
          </div>
          <div class="event-share">
            <h5>Comparte este evento</h5>
            <div class="footer-social-icons-wrapper">
                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//encuentronacional.cambioclimatico.gob.mx/"><img src="png/facebook.png" alt="Facebook" id="fb-logo-share"></a>
                <a href="https://twitter.com/home?status=Tercer%20encuentro%20nacional%20sobre%20cambio%20clim%C3%A1tico%20en%20M%C3%A9xico%20http%3A//encuentronacional.cambioclimatico.gob.mx/"><img src="png/twitter.png" alt="Twitter" id="twitter-logo-share"></a>
            </div>
          </div>
        </div>
        </div>  
      </div>   
    </div>

    <div class="logo-partners" >
      <img id="logos-partners" src="png/logo-partners.png" >
    </div>

  
      <iframe  id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.4662558223617!2d-99.14063028509324!3d19.435454286882635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f92cf20ea183%3A0x2cf06c7f4a8f31ff!2sInteractive+Museum+of+Economics!5e0!3m2!1sen!2smx!4v1535692610292"  frameborder="0" style="border:0" allowfullscreen></iframe>

      

  </main>
  <!-- Footer -->
      <footer>
      <section class="links">
        <div class="cont cont-links">
          <div class="links-wrapper">
            <div class="footer-nav-wrapper">
            <div class="footer-row">
              <div class="footer-container">

                
                <div class="link-group community logo-cambio-climatico">
                  <img id="logo-footer" src="png/cambio-climatico.png" alt="heart" />
                </div>
              </div>
              <div class="footer-container">
    
                <div class="link-group support">
                  <span><a href="#" id="title">Acerca de este Sitio Web</a></span>
                  <span class="footer-link-wrapper"><a href="#" id="link-1">Cooperación y Actores Clave</a></span>
                  <span class="footer-link-wrapper"><a href="#" class="link-2">Vinculación</a></span>
                  <span class="footer-link-wrapper"><a href="#" class="link-3">Normatividad</a></span>
                  <span class="footer-link-wrapper"><a href="#" class="link-4">Gobernanza</a></span>
                  <span class="footer-link-wrapper"><a href="https://www.gob.mx/terminos" class="link-5">Términos y Condiciones</a></span>
                  <span class="footer-link-wrapper"><a href="https://www.gob.mx/privacidadintegral" class="link-6">Privacidad de Datos</a></span>
                </div>
              </div>

            </div>
        
            </div>
            <div class="connect">
              <span><a href="#" class="title">Contacto</a></span>
              <div class="logo"></div>
              <div class="brief-page-info">
                Blvd. Adolfo Ruiz Cortines 4209<br>
                Col. Jardines en la Montaña<br>
                Del. Tlalpan, 14210<br>
                Ciudad de México, CDMX
              </div>
              <span class="title-follow-us-wrapper"><a href="#" class="title title-follow-us">Síguenos en</a></span>
              <div class="footer-social-icons-wrapper">
                <a href="https://es-la.facebook.com/InstitutoNacionalDeEcologiaYCambioClimatico"><img src="png/facebook.png" alt="Facebook" id="fb-logo"></a>
                <a href="https://twitter.com/inecc_gob_mx"><img src="png/twitter.png" alt="Twitter" id="twitter-logo"></a>
                <a href="https://www.instagram.com/ineccmx/?hl=es"><img src="png/instagram.png" alt="Instagram" id="instagram-logo"></a>
                <a href="https://www.youtube.com/channel/UC2Z8f7gE0HTsL6sxguPz90Q?view_as=subscriber"><img src="png/youtube.png" alt="Youtube" id="youtube-logo"></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </footer>

  

</body>


<script type="text/javascript" src="js/event.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>