<?php
  include ('header.php');
?>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <script language="JavaScript" type="text/javascript">
      $('#actorbtn').addClass("active");
    </script>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Find you actor</h1>
        <div class = "form-group">
          <div class="input-group">
              <span class="input-group-addon">Actor</span>
              <input type = 'text' name = 'actor' id = 'actor' placeholder= 'i.e. Keanu Reeves' class="form-control" >            
          </div>
        </div>
        
        <button  id = "btnAjax" onclick = "procesar();" class="btn btn-lg btn-success"/>Find</button>
      </div>


      <div class="page-header">
        <h1>Actor</h1>
      </div>
      <div id = "resultDiv">
          <ul class="list-group">
            <li class="list-group-item" id = 'actorName'></li>
            <li class="list-group-item" id = 'actorBorn'></li>
          </ul>
      </div>

    </div> <!-- /container -->

<?php
  include('tail.php');
?>
    <script language="JavaScript" type="text/javascript">
      function procesar(){
          var url = 'api/api/actor/' + $('#actor').val();
          $.ajax({
            url: url,
            type: 'GET',
            format: 'json',
            success: actualizar
          })
          function actualizar(data){

            $("#actorName").text('');
            $("#actorBorn").text('');

            var actor = JSON.parse(data);

            $("#actorName").text(actor.name);
            $("#actorBorn").text(actor.born);

            $('#resultDiv').show();
        }
      }
    </script>