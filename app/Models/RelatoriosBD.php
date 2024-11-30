<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RelatoriosBD extends Model
{
    public function Relatorios () 
    {
        $sqlSelect = "SELECT p.Autoid, t.nome as Talhao, TerrenoPlantado, p.Motivo, 
        c.nome as Cultivo, p.Q_Semente_H, p.Q_Adubo_H,DATE_FORMAT(p.DataInicio, '%d/%m/%Y') AS DataInicio  
        FROM plantio as p 
        inner join talhao as t on t.autoid = p.talhao
        inner join cultivo as c on c.autoid = p.cultivo";    	
    	$relatorios = DB::connection('mysql')->select($sqlSelect);
    		
    	return $relatorios;
    }
    
    public function find (string $autoid) 
    {
        if (!empty($autoid)){
            $sqlSelect = "SELECT * FROM plantio WHERE Autoid = " . $autoid;    	
            $relatorios = DB::connection('mysql')->select($sqlSelect);
                
            return $relatorios;
        }
    }

    public function salvar (Request $request) 
    {
        if(!empty($request->autoid)) {
            $sqlUpdate = "Update plantio set talhao = '" . $request->talhao . "', TerrenoPlantado= '" . $request->terrenoplantado . "', Motivo = '" . $request->motivo ."',Cultivo = '" . $request->cultivo ."', Q_Semente_H = '" . $request->sementeporhectar . "', Q_Adubo_H = '" . $request->aduboporhectar . "', DataInicio = '" . $request->datainicio . "' Where AutoId = " . $request->autoid;					                              
        } else {
            $sqlUpdate = "INSERT INTO plantio (Talhao,TerrenoPlantado,Motivo,Cultivo,Q_Semente_H,Q_Adubo_H,DataInicio) VALUES ('".$request->talhao."', '".$request->terrenoplantado."', '".$request->motivo."', '".$request->cultivo."', '".$request->sementeporhectar."', '".$request->aduboporhectar."', '".$request->datainicio."')";
        }
        return DB::connection('mysql')->update($sqlUpdate);	
    }

    public function remove (Request $request)
    {
        if(!empty($request)) {					
            $sqlUpdate = "Delete FROM plantio WHERE Autoid = ". $request->autoid;
            return DB::connection('mysql')->update($sqlUpdate);					
        }
    }
}
?>