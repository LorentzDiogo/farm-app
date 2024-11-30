<!DOCTYPE html> 
<html lang="pt-BR"> 
    <head> 
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    	
    	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<title>Relatórios - LTZ Farm</title> 
    </head> 
    <body> 
    	<div class="container py-3">  			
			<?php include './estrutura/menu.php' ?>
			<div class="badge bg-light text-black text-center" style="width: 100%; height: 60px">
				<h1><i>Gerar Relatório</i></h1>
			</div>						
			<br>					
			<br>

			<form action="/relatorios/save" method="post">
			@csrf
	  			<div class="mb-3">
				  	<label for="imputAutoId" class="form-label">Autoid</label>
				  	<input type="hidden" id="autoid" name="autoid" value="<?php if(!empty($obj)) {echo($obj->Autoid);} ?>">
				  	<input type="text" class="form-control" name="id" id="id" value="<?php if(!empty($obj)) {echo($obj->Autoid);} ?>" disabled>
				</div>
		  		<div class="mb-3">
				  	<label for="imputTalhao" class="form-label">Talhao</label>
				  	<input type="int" class="form-control" name="talhao" id="talhao" placeholder="1" value="<?php if(!empty($obj)) {echo($obj->Talhao);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputTerrenoPlantado" class="form-label">Terrano Plantado</label>
				  	<input type="int" class="form-control" name="terrenoplantado" id="terrenoplantado" placeholder="2,5" value="<?php if(!empty($obj)) {echo($obj->TerrenoPlantado);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputMotivo" class="form-label">Motivo</label>
				  	<input type="text" class="form-control" name="motivo" id="motivo" placeholder="Pasto para o Inverno" value="<?php if(!empty($obj)) {echo($obj->Motivo);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputCultivo" class="form-label">Cultivo</label>
				  	<input type="int" class="form-control" name="cultivo" id="cultivo" placeholder="4" value="<?php if(!empty($obj)) {echo($obj->Cultivo);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputSementePorHectar" class="form-label">Semente Por Hectar</label>
				  	<input type="numeric" class="form-control" name="sementeporhectar" id="sementeporhectar" placeholder="2,5" value="<?php if(!empty($obj)) {echo($obj->Q_Semente_H);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputAduboPorHectar" class="form-label">Adubo Por Hectar</label>
				  	<input type="numeric" class="form-control" name="aduboporhectar" id="aduboporhectar" placeholder="1,5" value="<?php if(!empty($obj)) {echo($obj->Q_Adubo_H);} ?>">
				</div>
				<div class="mb-3">
				  	<label for="imputDataInicio" class="form-label">Data Inicio</label>
				  	<input type="date" class="form-control" name="datainicio" id="datainicio" placeholder="2024-06-02" value="<?php if(!empty($obj)) {echo($obj->DataInicio);} ?>">
				</div>

				<button type="submit" class="btn btn-success" onclick="return confirm('Tem certeza que deseja realmente salvar este registro?')">Salvar</button>
			</form>

  		</div>
	</body> 
</html>
