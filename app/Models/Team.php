<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail;
class Team extends Model
{
    public $timestamps = false; 
    use HasFactory;
    public  function orders(){
        return $this->hasMany(Detail::class,'Team_id','id');
    }
    
}
