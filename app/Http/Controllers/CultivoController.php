<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CultivoBD;
use Illuminate\Support\Facades\Redirect;

class CultivoController extends Controller
{
    
    public function ola()
    {
        return 'OLA?';
    }

    public function index()
    {
        $cultivoBDObj = new CultivoBD();
        $resultado = $cultivoBDObj->cultivos();
        return view('cultivo.index',['resultado'=> $resultado]);
    }

    public function cadastro(Request $request)
    {
        if (empty($request->autoid)){
            return view('cultivo.cad_cultivo', ['obj'=>'','autoid'=>'']);
        } else {
            $cultivoBDObj = new CultivoBD();
            $resultado = $cultivoBDObj->find($request->autoid);
            if (!empty($resultado)){
                $resultado = $resultado[0];
            }
            return view('cultivo.cad_cultivo',['obj'=>$resultado]);
        }
    }

    public function save(Request $request)
    {
        $cultivoBDObj = new CultivoBD();
        $resultado = $cultivoBDObj->salvar($request);
        return Redirect::route('cultivo');
    }

    public function remove(Request $request) 
    {
        $cultivoBDObj = new CultivoBD();
        $resultado = $cultivoBDObj->remove($request);
        return Redirect::route('cultivo');
    }
}
?>
