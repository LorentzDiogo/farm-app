<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TalhaoBD;
use Illuminate\Support\Facades\Redirect;

class TalhaoController extends Controller
{
    
    public function ola()
    {
        return 'OLA?';
    }

    public function index()
    {
        $talhaoBDObj = new TalhaoBD();
        $resultado = $talhaoBDObj->talhoes();
        return view('talhao.index',['resultado'=> $resultado]);
    }

    public function cadastro(Request $request)
    {
        if (empty($request->autoid)){
            return view('talhao.cad_talhao', ['obj'=>'','autoid'=>'']);
        } else {
            $talhaoBDObj = new TalhaoBD();
            $resultado = $talhaoBDObj->find($request->autoid);
            if (!empty($resultado)){
                $resultado = $resultado[0];
            }
            return view('talhao.cad_talhao',['obj'=>$resultado]);
        }
    }

    public function save(Request $request)
    {
        $talhaoBDObj = new TalhaoBD();
        $resultado = $talhaoBDObj->salvar($request);
        return Redirect::route('talhao');
    }

    public function remove(Request $request) 
    {
        $talhaoBDObj = new TalhaoBD();
        $resultado = $talhaoBDObj->remove($request);
        return Redirect::route('talhao');
    }
}
?>
