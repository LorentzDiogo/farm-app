<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioBD;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    
    public function ola()
    {
        return 'OLA?';
    }

    public function index()
    {
        $usuarioBDObj = new UsuarioBD();
        $resultado = $usuarioBDObj->usuarios();
        return view('usuario.index',['resultado'=> $resultado]);
    }

    public function cadastro(Request $request)
    {
        if (empty($request->autoid)){
            return view('usuario.cad_usuario', ['obj'=>'','autoid'=>'']);
        } else {
            $usuarioBDObj = new UsuarioBD();
            $resultado = $usuarioBDObj->find($request->autoid);
            if (!empty($resultado)){
                $resultado = $resultado[0];
            }
            return view('usuario.cad_usuario',['obj'=>$resultado]);
        }
    }

    public function save(Request $request)
    {
        $usuarioBDObj = new UsuarioBD();
        $resultado = $usuarioBDObj->salvar($request);
        return Redirect::route('usuario');
    }

    public function remove(Request $request) 
    {
        $usuarioBDObj = new UsuarioBD();
        $resultado = $usuarioBDObj->remove($request);
        return Redirect::route('usuario');
    }
}
?>
