<!DOCTYPE html> 
<html lang="pt-BR"> 
    <head> 
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
    	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">   
    	<title>Talhões - LTZ Farm</title> 
    </head> 
    <body> 
		<div class="container py-3">
  			<?php include './estrutura/menu.php' ?>
			<div class="badge bg-light text-black text-center" style="width: 100%; height: 60px">
				<h1><i>Manutenção Propriedades</i></h1>
			</div>						
			<br>					
			<br>

			<form action="/propriedade/cadastro" method="get">			
				<button type="submit" class="btn btn-primary">Novo</button>
			</form>					
			<br>

			<table class="table table-striped table-hover" cellspacing="0" width="100%">
            <thead class="table-dark">
              	<tr >
					<th>AutoId</th>
					<th>Nome</th>
					<th>Endereco</th>
					<th><div class="row"><div class="col-12 text-center">Opções</div></div></th>
               	</tr>
            </thead>
            <tbody>
            @foreach($resultado as $x)
              	<tr>
					<td scope="row">{{ $x->AutoId }}</td> 
					<td>{{ $x->Nome }}</td>
					<td>{{ $x->Endereco }}</td>
					<td > 		
						<div class="row">			
							<div class="col-6 text-center">
								<form action="/propriedade/remove" method="get">
									<input type="hidden" id="autoid" name="autoid" value="<?php echo($x->AutoId); ?>"> 
									<button onclick="return confirm('Tem certeza que deseja deletar este registro?')" type="submit" class="btn btn-danger">Excluir</button> 
								</form>
							</div>
							<div class="col-6">
								<form action="/propriedade/cadastro" method="get"> 
									<input type="hidden" id="autoid" name="autoid" value="<?php echo($x->AutoId); ?>">
									<button type="submit" class="btn btn-warning">Alterar</button> 
								</form>							
							</div>
						</div>
					</td>		   
              	</tr>
            @endforeach
            </tbody>
        </table> 

		</div>
	</body> 
</html>
