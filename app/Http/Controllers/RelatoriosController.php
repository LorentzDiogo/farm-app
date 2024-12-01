<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelatoriosBD;
use Illuminate\Support\Facades\Redirect;

class RelatoriosController extends Controller
{
    public function ola()
    {
        return 'OLA?';
    }

    public function index(Request $request)
    {
        $cultivo = $request->input('cultivo');
        $talhao = $request->input('talhao');
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');

        $relatoriosBDObj = new RelatoriosBD();

        // Busca relatórios filtrados pelos parâmetros
        $resultado = $relatoriosBDObj->relatorio($cultivo, $talhao, $dataInicio, $dataFim);

        // Busca todos os cultivos e talhões para exibir nas listas suspensas
        $cultivos = $relatoriosBDObj->listarCultivos();
        $talhoes = $relatoriosBDObj->listarTalhoes();

        return view('relatorios.index', [
            'resultado' => $resultado,
            'cultivos' => $cultivos,
            'talhoes' => $talhoes,
            'cultivoSelecionado' => $cultivo,
            'talhaoSelecionado' => $talhao,
            'dataInicioSelecionada' => $dataInicio,
            'dataFimSelecionada' => $dataFim
        ]);
    }

    public function cadastro(Request $request)
    {
        if (empty($request->autoid)) {
            return view('relatorios.cad_relatorios', ['obj' => '', 'autoid' => '']);
        } else {
            $relatoriosBDObj = new RelatoriosBD();
            $resultado = $relatoriosBDObj->find($request->autoid);
            if (!empty($resultado)) {
                $resultado = $resultado[0];
            }
            return view('relatorios.cad_relatorios', ['obj' => $resultado]);
        }
    }

    public function save(Request $request)
    {
        $relatoriosBDObj = new RelatoriosBD();
        $resultado = $relatoriosBDObj->salvar($request);
        return Redirect::route('relatorios');
    }

    public function remove(Request $request)
    {
        $relatoriosBDObj = new RelatoriosBD();
        $resultado = $relatoriosBDObj->remove($request);
        return Redirect::route('relatorios');
    }
}
