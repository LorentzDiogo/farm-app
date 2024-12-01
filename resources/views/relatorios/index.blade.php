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

        <!-- Formulário de busca -->
        <form action="{{ route('relatorios') }}" method="GET" class="mb-3 row">
            <div class="col-md-4">
                <label for="cultivo" class="form-label">Cultivo</label>
                <select name="cultivo" id="cultivo" class="form-select">
                    <option value="">Selecione um cultivo</option>
                    @foreach ($cultivos as $c)
                        <option value="{{ $c->nome }}" {{ $cultivoSelecionado == $c->nome ? 'selected' : '' }}>
                            {{ $c->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="talhao" class="form-label">Talhão</label>
                <select name="talhao" id="talhao" class="form-select">
                    <option value="">Selecione um talhão</option>
                    @foreach ($talhoes as $t)
                        <option value="{{ $t->nome }}" {{ $talhaoSelecionado == $t->nome ? 'selected' : '' }}>
                            {{ $t->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="data_inicio" class="form-label">Data Início (De)</label>
                <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ $dataInicioSelecionada }}">
            </div>

            <div class="col-md-2">
                <label for="data_fim" class="form-label">Data Início (Até)</label>
                <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ $dataFimSelecionada }}">
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
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
