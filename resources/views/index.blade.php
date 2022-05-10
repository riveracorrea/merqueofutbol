<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Futbol Merqueo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>

       <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"> 
                  <div class="form-group">
                      
                     <form  enctype="multipart/form-data" class="form-horizontal mt-5" method="post" action="/UploadFile">
                        <h3>Seleccione los valores CSV (value1,value2,value3)</h3>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <div class="custom-file mt-2">
                             <input type="file" class="custom-file-input" id="customFile" name="Teams">
                             <label class="custom-file-label" for="customFile">Seleccionar CSV Equipos</label>
                        </div> 
                            <div class="custom-file mt-2">
                                <input type="file" class="custom-file-input" id="Players" name="Players">
                                <label class="custom-file-label" for="customFile">Seleccionar CSV Jugadores</label>
                            </div> 
                            <h5>Tener en cuenta: Los partidos se juegan de ida y vuelta</h5>
                              <input type="submit" class="btn btn-primary mt-2" value="Guardar Valores CSV">
                              <a href="/Play" class=" btn btn-danger mt-2" >Jugar Torneo</a>

                     </form
                    
                  </div>  

            </div> 
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                   <table class="table">
                      <tr><td><a href="/Query1" target="_blank" >Encuentros,Orden,Tarjetas,Resultado<a></td></tr>
                      <tr><td><a href="/Query2" target="_blank" >Equipos Fuera Campeonato<a></td></tr>
                      <tr><td><a href="/Query3" target="_blank" >Tabla de Posiciones<a></td></tr>
                      <tr><td><a href="/Query4" target="_blank" >Encuentros Ganados<a></td></tr>
                      <tr><td><a href="/Query5" target="_blank" >Encuentros Perdidos<a></td></tr>
                      <tr><td><a href="/Query6" target="_blank" >Amarillas/Rojas por Equipo<a></td></tr>
                      <tr><td><a href="/Query7" target="_blank" >Goles Total x Equipo<a></td></tr>
                      <tr><td><a href="/Query8" target="_blank" >Equipo Campeon<a></td></tr>
                    </table> 
                </div>
            </div>
        </div>
    </body>
</html>
