<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PropriedadeBD extends Model
{
    public function Propriedades () 
    {
        $sqlSelect = "SELECT * FROM propriedade";    	
    	$propriedades = DB::connection('mysql')->select($sqlSelect);
    		
    	return $propriedades;
    }
    
    public function find (string $autoid) 
    {
        if (!empty($autoid)){
            $sqlSelect = "SELECT * FROM propriedade WHERE AutoId = " . $autoid;    	
            $propriedade = DB::connection('mysql')->select($sqlSelect);
                
            return $propriedade;
        }
    }

    public function salvar (Request $request) 
    {
        if(!empty($request->autoid)) {
            $sqlUpdate = "Update propriedade set Nome = '" . $request->nome . "', Endereco= '" . $request->endereco . "' Where AutoId = " . $request->autoid;					                              
        } else {
            $sqlUpdate = "INSERT INTO propriedade (Nome,Endereco) VALUES ('".$request->nome."', '".$request->endereco."')";
        }
        return DB::connection('mysql')->update($sqlUpdate);	
    }

    public function remove (Request $request)
    {
        if(!empty($request)) {					
            $sqlUpdate = "Delete FROM propriedade WHERE AutoId = ". $request->autoid;
            return DB::connection('mysql')->update($sqlUpdate);					
        } 
    }
}
?>