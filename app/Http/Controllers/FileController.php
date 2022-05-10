<?php  
namespace App\Http\Controllers; 
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class FileController extends Controller{
  // Leer contenido de archivos CSV(Equipos,Jugadores)
    public function UploadFile(Request $request){
            $teams=$request->Teams;    
            $players=$request->Players;   
            $pathFileTeams = $teams->getRealPath();
            $pathFilePlayers=$players->getRealPath(); 
            $this->saveTeams($pathFileTeams); 
            $this->savePlayers($pathFilePlayers); 
    }


    // Guardar Equipos 
    public function saveTeams($path){   
           $handle = fopen( $path, "r");  
        while (($row = fgetcsv($handle, 1000, ',')) !== false){   
                $team =new Team;  
                $team->nombre=$row[0];
                $team->foto=""; 
                $team->save();
            
        }      
          fclose($handle);  
    }



    // Guardar Jugadores 
    public function savePlayers($path){   
        $handle = fopen( $path, "r");  
     while (($row = fgetcsv($handle, 1000, ',')) !== false){   
             $player =new Player;  
             $player->nombres=$row[0];
             $player->nacionalidad=$row[1];
             $player->edad=$row[2];
             $player->posicion=$row[3];
             $player->nrocamiseta=$row[4];
             $player->foto="";
             $player->team_id=1; 
             $player->save(); 
           
     }      
       fclose($handle);  
 }





}
