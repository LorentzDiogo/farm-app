<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantioBD;
use Illuminate\Support\Facades\Redirect;

class PlantioController extends Controller
{
    
    public function ola()
    {
        return 'OLA?';
    }

    public function index()
    {    
        $plantioBDObj = new PlantioBD();
        $resultado = $plantioBDObj->plantios();
        return view('plantio.index',['resultado'=> $resultado]);
    }

    public function cadastro(Request $request)
    {
        if (empty($request->autoid)){
            return view('plantio.cad_plantio', ['obj'=>'','autoid'=>'']);
        } else {
            $plantioBDObj = new PlantioBD();
            $resultado = $plantioBDObj->find($request->autoid);
            if (!empty($resultado)){
                $resultado = $resultado[0];
            }
            return view('plantio.cad_plantio',['obj'=>$resultado]);
        }
    }

    public function save(Request $request)
    {
        $plantioBDObj = new PlantioBD();
        $resultado = $plantioBDObj->salvar($request);
        return Redirect::route('plantio');
    }

    public function remove(Request $request) 
    {
        $plantioBDObj = new PlantioBD();
        $resultado = $plantioBDObj->remove($request);
        return Redirect::route('plantio');
    }
}
?>
