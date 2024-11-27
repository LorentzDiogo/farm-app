<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropriedadeBD;
use Illuminate\Support\Facades\Redirect;

class PropriedadeController extends Controller
{
    
    public function ola()
    {
        return 'OLA?';
    }

    public function index()
    {
        $propriedadeBDObj = new PropriedadeBD();
        $resultado = $propriedadeBDObj->propriedades();
        return view('propriedade.index',['resultado'=> $resultado]);
    }

    public function cadastro(Request $request)
    {
        if (empty($request->autoid)){
            return view('propriedade.cad_propriedade', ['obj'=>'','autoid'=>'']);
        } else {
            $propriedadeBDObj = new PropriedadeBD();
            $resultado = $propriedadeBDObj->find($request->autoid);
            if (!empty($resultado)){
                $resultado = $resultado[0];
            }
            return view('propriedade.cad_propriedade',['obj'=>$resultado]);
        }
    }

    public function save(Request $request)
    {
        $propriedadeBDObj = new PropriedadeBD();
        $resultado = $propriedadeBDObj->salvar($request);
        return Redirect::route('propriedade');
    }

    public function remove(Request $request) 
    {
        $propriedadeBDObj = new PropriedadeBD();
        $resultado = $propriedadeBDObj->remove($request);
        return Redirect::route('propriedade');
    }
}

