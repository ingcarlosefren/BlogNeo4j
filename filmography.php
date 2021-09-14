<?php
  include ('header.php');
?>
    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <script language="JavaScript" type="text/javascript">
      $('#filmographybtn').addClass("active");
    </script>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Find the filmography</h1>
        <div class = "form-group">
          <div class="input-group">
              <span class="input-group-addon">Actor</span>
              <input type = 'text' name = 'actor' id = 'actor' placeholder= 'i.e. Keanu Reeves' class="form-control" >            
          </div>
        </div>
        
        <button  id = "btnAjax" onclick = "procesar();" class="btn btn-lg btn-success"/>Find</button>
      </div>


      <div class="page-header">
        <h1>Filmography</h1>
      </div>
      <div id = "resultDiv">
        <table id="filmographyTable" class="table table-striped">
          <thead> 
            <tr> 
              <th>Title</th> 
              <th>Released</th> 
            </tr> 
          </thead> 
          <tbody> 
          </tbody>
        </table> 
      </div>

<?php
  include('tail.php');
?>

    <script language="JavaScript" type="text/javascript">
      function procesar(){
          var url = 'api/api/filmography/' + $('#actor').val();
          $.ajax({
            url: url,
            type: 'GET',
            format: 'json',
            success: actualizar
          })
          function actualizar(data){

            $("#actorName").text('');
            $("#actorBorn").text('');

            $('#filmographyTable tbody').empty();

            var jsonData = JSON.parse(data);
            var filmography = jsonData.filmography;

            for (i = 0; i < filmography.length; i++) {
                $("#filmographyTable tbody").append(
                  "<tr>"+
                  "<td>" + filmography[i].title + "</td>"+
                  "<td>" + filmography[i].released + "</td>"+
                  "</tr>");
            }

            $("#actorName").text(actor.name);
            $("#actorBorn").text(actor.born);

            $('#resultDiv').show();
        }
      }
    </script>