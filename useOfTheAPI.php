<!DOCTYPE html>
<!-- saved from url=(0039)http://getbootstrap.com/examples/theme/ -->
<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>

    <script language="JavaScript" type="text/javascript">
      $('#resultDiv').hide();
    </script>

    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>GGVD Videoclub</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Bootstrap theme -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/theme/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document" data-pinterest-extension-installed="cr1.37">

    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <script language="JavaScript" type="text/javascript">
      $('#moviebtn').addClass("active");
    </script>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Use of the API</h1>
      </div>

       <div class = "table-responsive">
          <table>
            <tr><th>Method</th><th>URL</th><th>Description</th><th>Use</th></tr>
            <tr><td>GET</td><td>/api/movie/{title}</td><td>Devuelve título, año de producción, casting, director y productor de la película proporcionada</td><td>curl -i -X GET http://<i>host</i>/Neo4jMovies/api/api/movie/The%20Matrix</td></tr>
            <tr><td>GET</td><td>/api/actor/{name}</td><td>Devuelve nombre y año de nacimiento del actor proporcionado</td><td>curl -i -X GET http://<i>host</i>/Neo4jMovies/api/api/actor/Keanu%20Reeves</td></tr>
            <tr><td>GET</td><td>/api/filmography/{name}</td><td>Devuelve nombre, año de namimiento y la filmografía del actor proporcionado</td><td>curl -i -X GET http://<i>host</i>/Neo4jMovies/api/api/filmography/Keanu%20Reeves</td></tr>
          </table>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1434210338544">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1434210338544" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="1140" height="500" viewBox="0 0 1140 500" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="53" style="font-weight:bold;font-size:53pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">Thirdslide</text></svg></body></html>


