 
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
            <th scope="col">#</th>
            <th scope="col">Visitante</th>
            <th scope="col"> Anfitrion</th>
            <th scope="col"> Amarillas Visitante</th>
            <th scope="col"> Amarillas Anfitrion</th>
            <th scope="col">Goles Visitante</th>
            <th scope="col">Goles Anfitrion</th>
          </tr>
        </thead>
        <tbody> 
          @foreach ($detEncuentros as $item)
           <tr> 
             <td>{{$item[0]["game_id"]}} </td> 
             <td>Equipo{{$item[0]["team_id"]}} </td>
             <td>Equipo{{$item[1]["team_id"]}} </td> 
             <td>{{$item[0]["amarillas"]}} </td>
             <td>{{$item[1]["amarillas"]}} </td>  
             <td>{{$item[0]["goles"]}} </td> 
             <td>{{$item[1]["goles"]}} </td> 
          </tr>
         @endforeach  
        </tbody>
      </table>



</body>
</html>