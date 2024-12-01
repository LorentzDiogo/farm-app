<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelatoriosBD extends Model
{
    // Método para listar cultivos com filtro opcional
    public function relatorio($cultivo = null, $talhao = null, $dataInicio = null, $dataFim = null)
    {
        $sqlSelect = "SELECT p.Autoid, t.nome as Talhao, TerrenoPlantado, p.Motivo, 
                      c.nome as Cultivo, p.Q_Semente_H, p.Q_Adubo_H, 
                      DATE_FORMAT(p.DataInicio, '%d/%m/%Y') AS DataInicio  
                      FROM plantio as p 
                      INNER JOIN talhao as t ON t.autoid = p.talhao
                      INNER JOIN cultivo as c ON c.autoid = p.cultivo
                      WHERE 1=1";

        $params = [];

        if (!empty($cultivo)) {
            $sqlSelect .= " AND c.nome LIKE :cultivo";
            $params['cultivo'] = '%' . $cultivo . '%';
        }

        if (!empty($talhao)) {
            $sqlSelect .= " AND t.nome LIKE :talhao";
            $params['talhao'] = '%' . $talhao . '%';
        }

        if (!empty($dataInicio)) {
            $sqlSelect .= " AND p.DataInicio >= :dataInicio";
            $params['dataInicio'] = $dataInicio;
        }

        if (!empty($dataFim)) {
            $sqlSelect .= " AND p.DataInicio <= :dataFim";
            $params['dataFim'] = $dataFim;
        }

        return DB::connection('mysql')->select($sqlSelect, $params);
    }

    // Método para listar talhões disponíveis
    public function listarTalhoes()
    {
        $sqlSelect = "SELECT autoid, nome FROM talhao ORDER BY nome";
        return DB::connection('mysql')->select($sqlSelect);
    }

    // Método para listar cultivos disponíveis
    public function listarCultivos()
    {
        $sqlSelect = "SELECT autoid, nome FROM cultivo ORDER BY nome";
        return DB::connection('mysql')->select($sqlSelect);
    }
}
