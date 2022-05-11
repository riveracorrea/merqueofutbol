 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Juego Nro</th> 
            <th scope="col">Codigo Equipo</th> 
            <th scope="col">Goles</th>
            
            
          </tr>
        </thead>
        <tbody> 
          @foreach ($parganados as $item)
           <tr> 
            <td>{{$item->game_id}}</td>   </td> 
             <td>{{$item->team_id}}</td>   </td> 
             <td>{{$item->goles }} </td> 
          </tr>
         @endforeach  
        </tbody>
      </table>



</body>
</html>