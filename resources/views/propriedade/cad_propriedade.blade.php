<!DOCTYPE html> 
<html lang="pt-BR"> 
    <head> 
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    	
    	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<title>Cadastro de Propriedades - LTZ Farm</title> 
    </head> 
    <body> 
    	<div class="container py-3">  			
			<?php include './estrutura/menu.php' ?>
			<div class="badge bg-light text-black text-center" style="width: 100%; height: 60px">
				<h1><i>Salvar Propriedade</i></h1>
			</div>						
			<br>					
			<br>

			<form action="/propriedade/save" method="post">
			@csrf
	  			<div class="mb-3">
				  	<label for="imputAutoId" class="form-label">AutoId</label>
				  	<input type="hidden" id="autoid" name="autoid" value="<?php if(!empty($obj)) {echo($obj->AutoId);} ?>">
				  	<input type="text" class="form-control" name="id" id="id" value="<?php if(!empty($obj)) {echo($obj->AutoId);} ?>" disabled>
				</div>
		  		<div class="mb-3">
				  	<label for="imputNome" class="form-label">Nome</label>
				  	<input type="text" class="form-control" name="nome" id="nome" placeholder="Rancho Alegria" value="<?php if(!empty($obj)) {echo($obj->Nome);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputEndereco" class="form-label">Endereco</label>
				  	<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Estrada Velha" value="<?php if(!empty($obj)) {echo($obj->Endereco);} ?>">
				</div>
				

				<button type="submit" class="btn btn-success" onclick="return confirm('Tem certeza que deseja realmente salvar este registro?')">Salvar</button>
			</form>

  		</div>
	</body>  
</html>
