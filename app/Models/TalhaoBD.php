<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TalhaoBD extends Model
{
    public function Talhoes () 
    {
        $sqlSelect = "SELECT t.AutoId, t.Nome, t.Tamanho, p.nome as Propriedade 
         FROM talhao as t inner join propriedade as p on p.AutoId = t.propriedade";    	
    	$talhoes = DB::connection('mysql')->select($sqlSelect);
    		
    	return $talhoes;
    }
    
    public function find (string $autoid) 
    {
        if (!empty($autoid)){
            $sqlSelect = "SELECT * FROM talhao WHERE AutoId = " . $autoid;    	
            $talhao = DB::connection('mysql')->select($sqlSelect);
                
            return $talhao;
        }
    }
    

    public function salvar (Request $request) 
    {
        if(!empty($request->autoid)) {
            $sqlUpdate = "Update talhao set Nome = '" . $request->nome . "', Tamanho= '" . $request->tamanho . "', Propriedade = '" . $request->propriedade . "' Where AutoId = " . $request->autoid;					                              
        } else {
            $sqlUpdate = "INSERT INTO talhao (Nome,Tamanho,Propriedade) VALUES ('".$request->nome."', '".$request->tamanho."', '".$request->propriedade."')";
        }
        return DB::connection('mysql')->update($sqlUpdate);	
    }

    public function remove (Request $request)
    {
        if(!empty($request)) {					
            $sqlUpdate = "Delete FROM talhao WHERE AutoId = ". $request->autoid;
            return DB::connection('mysql')->update($sqlUpdate);					
        }
    }
}
?>