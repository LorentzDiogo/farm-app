<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Relatórios - LTZ Farm</title>
</head>
<body>
    <div class="container py-3">
        <?php include './estrutura/menu.php' ?>
        <div class="badge bg-light text-black text-center" style="width: 100%; height: 60px">
            <h1><i>Relatórios</i></h1>
        </div>

        <!-- Formulário de busca por cultivo -->
        <form action="{{ route('relatorios') }}" method="GET" class="mb-3 d-flex">
            <input type="text" name="cultivo" class="form-control me-2" placeholder="Digite o nome do cultivo">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <table class="table table-striped table-hover" cellspacing="0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th>AutoId</th>
                    <th>Talhão</th>
                    <th>Terreno Plantado</th>
                    <th>Motivo</th>
                    <th>Cultivo</th>
                    <th>Kg de Semente Por Hectar</th>
                    <th>Kg de Adubo Por Hectar</th>
                    <th>Data Início</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @if (count($resultado) > 0)
                @foreach($resultado as $x)
                    <tr>
                        <td scope="row">{{ $x->Autoid }}</td>
                        <td>{{ $x->Talhao }}</td>
                        <td>{{ $x->TerrenoPlantado }}</td>
                        <td>{{ $x->Motivo }}</td>
                        <td>{{ $x->Cultivo }}</td>
                        <td>{{ $x->Q_Semente_H }}</td>
                        <td>{{ $x->Q_Adubo_H }}</td>
                        <td>{{ $x->DataInicio }}</td>
                        <td>
                            <a href="/relatorios/editar/{{ $x->Autoid }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/relatorios/excluir/{{ $x->Autoid }}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este relatório?');">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">Nenhum relatório encontrado.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
