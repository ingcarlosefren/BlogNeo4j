<?php
  include ('header.php');
?>

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
        <h1>Find you movie</h1>
        <div class = "form-group">
          <div class="input-group">
              <span class="input-group-addon">Movie</span>
              <input type = 'text' name = 'movie' id = 'movie' placeholder= 'i.e. The Matrix' class="form-control" >            
          </div>
        </div>
        
        <button  id = "btnAjax" onclick = "procesar();" class="btn btn-lg btn-success"/>Find</button>
      </div>


      <div class="page-header">
        <h1>Movie</h1>
      </div>
      <div id = "resultDiv">
          <ul class="list-group">
            <li class="list-group-item" id = 'movieTitle'></li>
            <li class="list-group-item" id = 'movieReleased'></li>
            <li class="list-group-item" id = 'movieTagLine'></li>
          </ul>
      </div>

    </div> <!-- /container -->

<?php
  include('tail.php');
?>

    <script language="JavaScript" type="text/javascript">
      function procesar(){
          var url = 'api/api/movie/' + $('#movie').val();
          $.ajax({
            url: url,
            type: 'GET',
            format: 'json',
            success: actualizar
          })
          function actualizar(data){

            $("#movieTitle").text('');
            $("#movieReleased").text('');
            $("#movieTagLine").text('');

            var movie = JSON.parse(data);

            $("#movieTitle").text(movie.title);
            $("#movieReleased").text(movie.released);
            $("#movieTagLine").text(movie.tagline);

            $('#resultDiv').show();
        }
      }
    </script>