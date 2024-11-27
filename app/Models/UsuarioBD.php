<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioBD extends Model
{
    public function usuarios () 
    {
        $sqlSelect = "SELECT * FROM usuario";    	
    	$usuarios = DB::connection('mysql')->select($sqlSelect);
    		
    	return $usuarios;
    }
    
    public function find (string $autoid) 
    {
        if (!empty($autoid)){
            $sqlSelect = "SELECT * FROM usuario WHERE AutoId = " . $autoid;    	
            $usuario = DB::connection('mysql')->select($sqlSelect);
                
            return $usuario;
        }
    }

    public function salvar (Request $request) 
    {
        if(!empty($request->autoid)) {
            $sqlUpdate = "Update usuario set Nome = '" . $request->nome . "', CPF= '" . $request->cpf . "', Senha = '" . $request->senha . "' Where AutoId = " . $request->autoid;					                              
        } else {
            $sqlUpdate = "INSERT INTO usuario (Nome, CPF, Senha) VALUES ('".$request->nome."', '".$request->cpf."', '".$request->senha."')";
        }
        return DB::connection('mysql')->update($sqlUpdate);	
    }

    public function remove (Request $request)
    {
        if(!empty($request)) {					
            $sqlUpdate = "Delete FROM usuario WHERE AutoId = ". $request->autoid;
            return DB::connection('mysql')->update($sqlUpdate);					
        }
    }
}
?>