<?php

namespace App\Http\Controllers;
use App\Models\Detail;
use App\Models\Team;
use Illuminate\Http\Request;
use DB;

class QueryController extends Controller{
   // Determinar orden,encuentros y resultados 
    public function query1(){
        $detEncuentros=Detail::All()->groupBy('game_id')->toArray();  
        return view('Query.query1')->with('detEncuentros',$detEncuentros);
    }


    //Equipos por fuera del campeonato
    public function query2(){
        $fuera=Team::where('estado', 0)->get(); 
        return view('Query.query2')->with('fuera',$fuera);
    }

    //Puntajes por equipo
    public function query3(){ 
        $positions=Detail::select( 
            "team_id", 
            DB::raw("SUM(puntos) as total"),
        )->groupBy("team_id")->orderBy('total' ,'DESC')->get(); 
       return view('Query.query3')->with('positions',$positions);
    }


    public function query4(){ 
        $parGanados=Detail::select('game_id','team_id','goles')->where('resultado', 1)->get();  
        return view('Query.query4')->with('parganados',$parGanados);  
         
    }

    public function query5(){ 
        $parPerdidos=Detail::select('game_id','team_id','goles')->where('resultado', 0)->get();  
        return view('Query.query5')->with('parPerdidos',$parPerdidos);  
         
    }


}
