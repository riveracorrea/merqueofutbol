<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Game;
use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;

class PlayController extends Controller{
    private $team = null;
    // Seleccionar equipos habilitados para jugar
    public function play(){

        $this->team =Team::select('id')->where('estado', 0)->get(); 
        $rondaPartidos=0;
        while ($rondaPartidos!=count($this->team)){
         for($i=0; $i<count($this->team); $i++){
            for($j=0; $j<count($this->team); $j++){
                if($i!==$j){
                    $idGame=$this->newGame();
                    $golesVis=random_int(0,10);
                    $golesAnf=random_int(0,10);
                    $resuVis=2;$resuAnf=2; 
                    $puntVis=1;$puntAnf=1;
                    if($golesVis>$golesAnf)
                        $resuVis=1;$resuAnf=0;
                        $puntVis=3;$puntAnf=0;
                    if($golesVis<$golesAnf)
                       $resuVis=0;$resuAnf=1;
                       $puntVis=0;$puntAnf=3;
                          

                    $this->saveDataVisiting($idGame,$this->team[$i]["id"],$golesVis,$resuVis,$puntVis);
                    $this->saveDataHost($idGame,$this->team[$j]["id"], $golesAnf,$resuAnf,$puntAnf); 

                }
            }
          }
          $rondaPartidos++;
          $this->positions();
          $this->team =Team::select('id')->where('estado', 0)->get(); 

        }
        return view('index');
    }

   // Crear un partido nuevo
    public function newGame() { 

           $game=new Game();
           $game->fecha = new \DateTime('NOW');
           $game->save();
           return $game->id;

    }


   // Guardar Resultado Visitante
    public function saveDataVisiting($idGame,$idTeam,$goles,$res,$puntVis){
        
        $detailGame=new Detail;
        $detailGame->game_id=$idGame;
        $detailGame->team_id=$idTeam; 
        $detailGame->goles=$goles;
        $detailGame->amarillas=random_int(0,5);
        $detailGame->rojas=random_int(0,5); 
        $detailGame->anfitrion=0;
        $detailGame->resultado=$res;
        $detailGame->puntos=$puntVis;
        $detailGame->save();  
         

    }

    // Guardar Resultados Anfitrion
    public function saveDataHost($idGame,$idTeam,$goles,$res,$puntosAnf){
        $detailGame=new Detail; 
        $detailGame->game_id=$idGame;
        $detailGame->team_id=$idTeam;
        $detailGame->goles=random_int(0,10);
        $detailGame->amarillas=random_int(0,5);
        $detailGame->rojas=random_int(0,5);
        $detailGame->anfitrion=0;
        $detailGame->resultado=$res;
        $detailGame->puntos=$puntosAnf;
        $detailGame->save();  

    }

    // Evaluar estado de acuerdo a resultados en partidos por ronda de juegos
    public function positions(){
        
        $detailGame=Detail::select('team_id')->where('resultado', 0)
                            ->groupBy('team_id')
                            ->orderByRaw('SUM(resultado) DESC')
                            ->get()->first();
        $team_id=$detailGame->team_id;
        Team::where('id',$team_id)->update(['estado'=>1]);
       
    }



}
