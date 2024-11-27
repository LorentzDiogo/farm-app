<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CultivoBD extends Model
{
    public function Cultivos () 
    {
        $sqlSelect = "SELECT * FROM cultivo";    	
    	$cultivos = DB::connection('mysql')->select($sqlSelect);
    		
    	return $cultivos;
    }
    
    public function find (string $autoid) 
    {
        if (!empty($autoid)){
            $sqlSelect = "SELECT * FROM cultivo WHERE AutoId = " . $autoid;    	
            $cultivo = DB::connection('mysql')->select($sqlSelect);
                
            return $cultivo;
        }
    }

    public function salvar (Request $request) 
    {
        if(!empty($request->autoid)) {
            $sqlUpdate = "Update cultivo set Nome = '" . $request->nome . "' Where AutoId = " . $request->autoid;					                              
        } else {
            $sqlUpdate = "INSERT INTO cultivo (Nome) VALUES ('".$request->nome."')";
        }
        return DB::connection('mysql')->update($sqlUpdate);	
    }

    public function remove (Request $request)
    {
        if(!empty($request)) {					
            $sqlUpdate = "Delete FROM cultivo WHERE AutoId = ". $request->autoid;
            return DB::connection('mysql')->update($sqlUpdate);					
        }
    }
}
?>